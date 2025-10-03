<?php

namespace App\Filament\Resources\HeatTypes\Pages;

use App\Filament\Resources\HeatTypes\HeatTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHeatType extends EditRecord
{
    protected static string $resource = HeatTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
