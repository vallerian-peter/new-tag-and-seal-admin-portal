<?php

namespace App\Filament\Resources\LivestockStatuses\Pages;

use App\Filament\Resources\LivestockStatuses\LivestockStatusResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLivestockStatus extends EditRecord
{
    protected static string $resource = LivestockStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
