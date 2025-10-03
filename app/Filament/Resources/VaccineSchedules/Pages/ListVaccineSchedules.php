<?php

namespace App\Filament\Resources\VaccineSchedules\Pages;

use App\Filament\Resources\VaccineSchedules\VaccineScheduleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVaccineSchedules extends ListRecords
{
    protected static string $resource = VaccineScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
