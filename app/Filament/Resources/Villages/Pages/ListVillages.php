<?php

namespace App\Filament\Resources\Villages\Pages;

use App\Models\Village;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Villages\VillageResource;

class ListVillages extends ListRecords
{
    protected static string $resource = VillageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
