<?php

namespace App\Filament\Resources\MilkingStatuses\Pages;

use App\Filament\Resources\MilkingStatuses\MilkingStatusResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMilkingStatus extends EditRecord
{
    protected static string $resource = MilkingStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
