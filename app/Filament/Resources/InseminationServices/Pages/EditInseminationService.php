<?php

namespace App\Filament\Resources\InseminationServices\Pages;

use App\Filament\Resources\InseminationServices\InseminationServiceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditInseminationService extends EditRecord
{
    protected static string $resource = InseminationServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
