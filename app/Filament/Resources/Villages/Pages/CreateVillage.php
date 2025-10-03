<?php

namespace App\Filament\Resources\Villages\Pages;

use App\Models\Village;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Villages\VillageResource;

class CreateVillage extends CreateRecord
{
    protected static string $resource = VillageResource::class;

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
