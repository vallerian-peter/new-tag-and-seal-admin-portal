<?php

namespace App\Filament\Resources\VaccineStatuses\Pages;

use App\Filament\Resources\VaccineStatuses\VaccineStatusResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVaccineStatuses extends ListRecords
{
    protected static string $resource = VaccineStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
