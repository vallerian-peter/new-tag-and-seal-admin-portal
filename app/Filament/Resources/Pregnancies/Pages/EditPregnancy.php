<?php

namespace App\Filament\Resources\Pregnancies\Pages;

use App\Filament\Resources\Pregnancies\PregnancyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPregnancy extends EditRecord
{
    protected static string $resource = PregnancyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
