<?php

namespace App\Filament\Resources\Calvings\Pages;

use App\Filament\Resources\Calvings\CalvingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCalving extends EditRecord
{
    protected static string $resource = CalvingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
