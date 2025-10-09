<?php

namespace App\Filament\Resources\Dewormings\Pages;

use App\Filament\Resources\Dewormings\DewormingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeworming extends EditRecord
{
    protected static string $resource = DewormingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
