<?php

namespace App\Filament\Resources\IdentityCardTypes\Pages;

use App\Models\IdentityCardType;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\IdentityCardTypes\IdentityCardTypeResource;

class CreateIdentityCardType extends CreateRecord
{
    protected static string $resource = IdentityCardTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->user()->id ?? 1;
        $data['updated_by'] = auth()->user()->id ?? 1;

        return $data;
    }
}
