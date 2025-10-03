<?php

namespace App\Filament\Resources\LivestockObtainedMethods\Pages;

use App\Filament\Resources\LivestockObtainedMethods\LivestockObtainedMethodResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLivestockObtainedMethod extends ViewRecord
{
    protected static string $resource = LivestockObtainedMethodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
