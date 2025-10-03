<?php

namespace App\Filament\Resources\MilkingUnits\Pages;

use App\Filament\Resources\MilkingUnits\MilkingUnitResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMilkingUnit extends EditRecord
{
    protected static string $resource = MilkingUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
