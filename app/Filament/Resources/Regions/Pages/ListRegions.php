<?php

namespace App\Filament\Resources\Regions\Pages;

use App\Models\Region;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Regions\RegionResource;

class ListRegions extends ListRecords
{
    protected static string $resource = RegionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
