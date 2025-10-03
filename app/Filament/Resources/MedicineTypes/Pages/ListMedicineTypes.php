<?php

namespace App\Filament\Resources\MedicineTypes\Pages;

use App\Filament\Resources\MedicineTypes\MedicineTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMedicineTypes extends ListRecords
{
    protected static string $resource = MedicineTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
