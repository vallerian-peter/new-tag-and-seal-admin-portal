<?php

namespace App\Filament\Resources\Users\Pages;

use App\Models\User;
use App\Models\SystemUser;
use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        // Get current user ID for audit fields
        $currentUserId = auth()->user()->id ?? 1; // Fallback to 1 if no auth user

        // First, create the SystemUser record (profile data)
        $systemUserData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'address' => $data['address'] ?? null,
            'created_by' => $data['created_by'] ?? $currentUserId,
            'updated_by' => $data['updated_by'] ?? $currentUserId,
            'status_id' => $data['status_id'],
        ];

        $systemUser = SystemUser::create($systemUserData);

        // Then, create the User record (authentication data)
        $userData = [
            'username' => $data['username'] ?: $data['email'], // Use email as username if username not provided
            'password' => $data['password'],
            'profile' => 'SystemUser', // Always SystemUser for this form
            'profile_id' => $systemUser->id, // Link to SystemUser
            'status_id' => $data['status_id'],
            'state_id' => $data['state_id'] ?? null,
            'created_by' => $data['created_by'] ?? $currentUserId,
            'updated_by' => $data['updated_by'] ?? $currentUserId,
        ];

        return User::create($userData);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
