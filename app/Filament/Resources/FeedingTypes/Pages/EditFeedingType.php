<?php

namespace App\Filament\Resources\FeedingTypes\Pages;

use App\Filament\Resources\FeedingTypes\FeedingTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFeedingType extends EditRecord
{
    protected static string $resource = FeedingTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
