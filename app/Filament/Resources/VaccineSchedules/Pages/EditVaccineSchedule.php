<?php

namespace App\Filament\Resources\VaccineSchedules\Pages;

use App\Filament\Resources\VaccineSchedules\VaccineScheduleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVaccineSchedule extends EditRecord
{
    protected static string $resource = VaccineScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
