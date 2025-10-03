<?php

namespace App\Filament\Resources\IdentityCardTypes\Pages;

use App\Models\IdentityCardType;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\IdentityCardTypes\IdentityCardTypeResource;

class ListIdentityCardTypes extends ListRecords
{
    protected static string $resource = IdentityCardTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
