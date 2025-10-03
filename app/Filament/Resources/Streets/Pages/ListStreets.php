<?php

namespace App\Filament\Resources\Streets\Pages;

use App\Models\Street;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Streets\StreetResource;

class ListStreets extends ListRecords
{
    protected static string $resource = StreetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
