<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Filament\Resources\Users\Schemas\UserViewSchema;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->disabled(fn ($record) => $record->profile != 'SystemUser'),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getContentWidth(): ?string
    {
        return 'full';
    }

    public function form(Schema $schema): Schema
    {
        Log::info('ViewUser: Rendering user view', [
            'user_id' => $this->getRecord()->id,
            'username' => $this->getRecord()->username,
            'profile' => $this->getRecord()->profile,
            'viewer_id' => auth()->id(),
        ]);

        return UserViewSchema::configure($schema, $this->getRecord());
    }
}
