<?php

namespace App\Filament\Resources\MilkingMethods\Pages;

use App\Filament\Resources\MilkingMethods\MilkingMethodResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMilkingMethod extends EditRecord
{
    protected static string $resource = MilkingMethodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
