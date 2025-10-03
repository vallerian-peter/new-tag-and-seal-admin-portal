<?php

namespace App\Filament\Resources\LivestockObtainedMethods\Pages;

use App\Filament\Resources\LivestockObtainedMethods\LivestockObtainedMethodResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLivestockObtainedMethods extends ListRecords
{
    protected static string $resource = LivestockObtainedMethodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
