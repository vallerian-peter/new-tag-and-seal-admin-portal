<?php

namespace App\Filament\Resources\VaccineStatuses\Pages;

use App\Filament\Resources\VaccineStatuses\VaccineStatusResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVaccineStatus extends EditRecord
{
    protected static string $resource = VaccineStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
