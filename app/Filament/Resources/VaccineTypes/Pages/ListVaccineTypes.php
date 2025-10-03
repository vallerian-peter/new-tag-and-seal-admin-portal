<?php

namespace App\Filament\Resources\VaccineTypes\Pages;

use App\Filament\Resources\VaccineTypes\VaccineTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVaccineTypes extends ListRecords
{
    protected static string $resource = VaccineTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
