<?php

namespace App\Filament\Resources\InseminationServices\Pages;

use App\Filament\Resources\InseminationServices\InseminationServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInseminationServices extends ListRecords
{
    protected static string $resource = InseminationServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
