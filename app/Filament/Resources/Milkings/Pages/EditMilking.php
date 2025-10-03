<?php

namespace App\Filament\Resources\Milkings\Pages;

use App\Filament\Resources\Milkings\MilkingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMilking extends EditRecord
{
    protected static string $resource = MilkingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
