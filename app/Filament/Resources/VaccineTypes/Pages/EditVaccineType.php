<?php

namespace App\Filament\Resources\VaccineTypes\Pages;

use App\Filament\Resources\VaccineTypes\VaccineTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVaccineType extends EditRecord
{
    protected static string $resource = VaccineTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
