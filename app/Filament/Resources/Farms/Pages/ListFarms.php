<?php

namespace App\Filament\Resources\Farms\Pages;

use App\Models\Farm;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Farms\FarmResource;

class ListFarms extends ListRecords
{
    protected static string $resource = FarmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
