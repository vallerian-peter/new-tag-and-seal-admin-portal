<?php

namespace App\Filament\Resources\Livestocks\Pages;

use App\Filament\Resources\Livestocks\LivestockResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLivestock extends EditRecord
{
    protected static string $resource = LivestockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
