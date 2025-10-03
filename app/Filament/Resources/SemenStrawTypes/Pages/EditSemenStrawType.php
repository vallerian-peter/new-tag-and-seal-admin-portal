<?php

namespace App\Filament\Resources\SemenStrawTypes\Pages;

use App\Filament\Resources\SemenStrawTypes\SemenStrawTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSemenStrawType extends EditRecord
{
    protected static string $resource = SemenStrawTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
