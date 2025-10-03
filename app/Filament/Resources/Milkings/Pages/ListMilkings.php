<?php

namespace App\Filament\Resources\Milkings\Pages;

use App\Filament\Resources\Milkings\MilkingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMilkings extends ListRecords
{
    protected static string $resource = MilkingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
