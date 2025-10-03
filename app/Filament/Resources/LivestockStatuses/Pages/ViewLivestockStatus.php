<?php

namespace App\Filament\Resources\LivestockStatuses\Pages;

use App\Filament\Resources\LivestockStatuses\LivestockStatusResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLivestockStatus extends ViewRecord
{
    protected static string $resource = LivestockStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
