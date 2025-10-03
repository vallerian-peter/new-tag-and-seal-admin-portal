<?php

namespace App\Filament\Resources\States\Pages;

use App\Models\State;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\States\StateResource;

class ListStates extends ListRecords
{
    protected static string $resource = StateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
