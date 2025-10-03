<?php

namespace App\Filament\Resources\HeatTypes\Pages;

use App\Filament\Resources\HeatTypes\HeatTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHeatTypes extends ListRecords
{
    protected static string $resource = HeatTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
