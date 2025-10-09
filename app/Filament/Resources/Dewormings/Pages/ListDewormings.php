<?php

namespace App\Filament\Resources\Dewormings\Pages;

use App\Filament\Resources\Dewormings\DewormingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDewormings extends ListRecords
{
    protected static string $resource = DewormingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
