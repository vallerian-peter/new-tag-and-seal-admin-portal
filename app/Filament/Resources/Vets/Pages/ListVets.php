<?php

namespace App\Filament\Resources\Vets\Pages;

use App\Filament\Resources\Vets\VetResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVets extends ListRecords
{
    protected static string $resource = VetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
