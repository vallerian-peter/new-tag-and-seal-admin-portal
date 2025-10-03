<?php

namespace App\Filament\Resources\Vets\Pages;

use App\Filament\Resources\Vets\VetResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVet extends EditRecord
{
    protected static string $resource = VetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
