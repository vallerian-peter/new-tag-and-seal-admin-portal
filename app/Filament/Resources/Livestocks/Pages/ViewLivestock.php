<?php

namespace App\Filament\Resources\Livestocks\Pages;

use App\Filament\Resources\Livestocks\LivestockResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLivestock extends ViewRecord
{
    protected static string $resource = LivestockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
