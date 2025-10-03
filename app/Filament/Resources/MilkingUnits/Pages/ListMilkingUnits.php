<?php

namespace App\Filament\Resources\MilkingUnits\Pages;

use App\Filament\Resources\MilkingUnits\MilkingUnitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMilkingUnits extends ListRecords
{
    protected static string $resource = MilkingUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
