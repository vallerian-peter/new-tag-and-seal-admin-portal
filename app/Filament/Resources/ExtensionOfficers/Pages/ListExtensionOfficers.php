<?php

namespace App\Filament\Resources\ExtensionOfficers\Pages;

use App\Filament\Resources\ExtensionOfficers\ExtensionOfficerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExtensionOfficers extends ListRecords
{
    protected static string $resource = ExtensionOfficerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
