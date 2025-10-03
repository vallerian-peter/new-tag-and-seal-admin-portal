<?php

namespace App\Filament\Resources\MedicineQuantityUnits\Pages;

use App\Filament\Resources\MedicineQuantityUnits\MedicineQuantityUnitResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMedicineQuantityUnit extends EditRecord
{
    protected static string $resource = MedicineQuantityUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
