<?php

namespace App\Filament\Resources\SemenStrawTypes\Pages;

use App\Filament\Resources\SemenStrawTypes\SemenStrawTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSemenStrawTypes extends ListRecords
{
    protected static string $resource = SemenStrawTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
