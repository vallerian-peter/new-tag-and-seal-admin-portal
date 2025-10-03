<?php

namespace App\Filament\Resources\MedicineTypes\Pages;

use App\Filament\Resources\MedicineTypes\MedicineTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMedicineType extends EditRecord
{
    protected static string $resource = MedicineTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
