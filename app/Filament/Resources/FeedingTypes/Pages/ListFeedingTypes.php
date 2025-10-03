<?php

namespace App\Filament\Resources\FeedingTypes\Pages;

use App\Filament\Resources\FeedingTypes\FeedingTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFeedingTypes extends ListRecords
{
    protected static string $resource = FeedingTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
