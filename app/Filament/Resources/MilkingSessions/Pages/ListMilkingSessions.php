<?php

namespace App\Filament\Resources\MilkingSessions\Pages;

use App\Filament\Resources\MilkingSessions\MilkingSessionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMilkingSessions extends ListRecords
{
    protected static string $resource = MilkingSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
