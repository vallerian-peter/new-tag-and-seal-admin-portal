<?php

namespace App\Filament\Resources\LivestockTypes\Pages;

use App\Filament\Resources\LivestockTypes\LivestockTypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLivestockType extends ViewRecord
{
    protected static string $resource = LivestockTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
