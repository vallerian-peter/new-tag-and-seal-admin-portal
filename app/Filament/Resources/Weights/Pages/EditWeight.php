<?php

namespace App\Filament\Resources\Weights\Pages;

use App\Filament\Resources\Weights\WeightResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWeight extends EditRecord
{
    protected static string $resource = WeightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
