<?php

namespace App\Filament\Resources\LivestockStatuses\Pages;

use App\Filament\Resources\LivestockStatuses\LivestockStatusResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLivestockStatuses extends ListRecords
{
    protected static string $resource = LivestockStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
