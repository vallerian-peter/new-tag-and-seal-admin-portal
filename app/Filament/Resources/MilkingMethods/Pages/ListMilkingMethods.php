<?php

namespace App\Filament\Resources\MilkingMethods\Pages;

use App\Filament\Resources\MilkingMethods\MilkingMethodResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMilkingMethods extends ListRecords
{
    protected static string $resource = MilkingMethodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
