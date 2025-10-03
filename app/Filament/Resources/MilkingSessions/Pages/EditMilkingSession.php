<?php

namespace App\Filament\Resources\MilkingSessions\Pages;

use App\Filament\Resources\MilkingSessions\MilkingSessionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMilkingSession extends EditRecord
{
    protected static string $resource = MilkingSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
