<?php

namespace App\Filament\Resources\MilkingStatuses\Pages;

use App\Filament\Resources\MilkingStatuses\MilkingStatusResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMilkingStatuses extends ListRecords
{
    protected static string $resource = MilkingStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
