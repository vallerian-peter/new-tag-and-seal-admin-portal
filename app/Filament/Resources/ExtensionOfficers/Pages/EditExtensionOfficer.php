<?php

namespace App\Filament\Resources\ExtensionOfficers\Pages;

use App\Filament\Resources\ExtensionOfficers\ExtensionOfficerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExtensionOfficer extends EditRecord
{
    protected static string $resource = ExtensionOfficerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
