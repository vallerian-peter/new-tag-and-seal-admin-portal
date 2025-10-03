<?php

namespace App\Filament\Resources\LivestockTypes\Pages;

use App\Filament\Resources\LivestockTypes\LivestockTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLivestockType extends EditRecord
{
    protected static string $resource = LivestockTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
