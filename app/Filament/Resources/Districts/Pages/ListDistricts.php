<?php

namespace App\Filament\Resources\Districts\Pages;

use App\Models\District;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Districts\DistrictResource;

class ListDistricts extends ListRecords
{
    protected static string $resource = DistrictResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
