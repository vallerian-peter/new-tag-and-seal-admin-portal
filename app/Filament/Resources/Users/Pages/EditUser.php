<?php

namespace App\Filament\Resources\Users\Pages;

use App\Models\User;
use App\Models\SystemUser;
use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    public function form(Schema $schema): Schema
    {
        return UserResource::editForm($schema);
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Only allow editing SystemUser profile types
        if ($this->record->profile !== 'SystemUser') {
            abort(403, 'Only SystemUser profiles can be edited.');
        }

        // Get the SystemUser data and merge it with the User data
        if ($this->record->systemUser) {
            $systemUserData = $this->record->systemUser->toArray();
            $data = array_merge($data, $systemUserData);
        }

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // Only allow updating SystemUser profile types
        if ($record->profile !== 'SystemUser') {
            abort(403, 'Only SystemUser profiles can be updated.');
        }

        // Get current user ID for audit fields
        $currentUserId = auth()->user()->id ?? 1;

        // Update the SystemUser record (profile data)
        if ($record->systemUser) {
            $systemUserData = [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? null,
                'address' => $data['address'] ?? null,
                'updated_by' => $currentUserId,
                'status_id' => $data['status_id'],
            ];

            $record->systemUser->update($systemUserData);
        }

        // Update the User record (authentication data)
        $userData = [
            'username' => $data['username'] ?: $data['email'],
            'status_id' => $data['status_id'],
            'state_id' => $data['state_id'] ?? null,
            'profile' => $record->profile, // Use existing profile since field is disabled
            'profile_id' => $record->systemUser->id,
            'updated_by' => $currentUserId,
        ];

        // Only update password if provided (since field is hidden in edit mode)
        if (!empty($data['password'])) {
            $userData['password'] = $data['password'];
        }

        $record->update($userData);

        return $record;
    }
}
