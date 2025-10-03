<?php

namespace App\Filament\Resources\MedicineQuantityUnits\Pages;

use App\Filament\Resources\MedicineQuantityUnits\MedicineQuantityUnitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMedicineQuantityUnits extends ListRecords
{
    protected static string $resource = MedicineQuantityUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
