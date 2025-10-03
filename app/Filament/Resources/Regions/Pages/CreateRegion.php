<?php

namespace App\Filament\Resources\Regions\Pages;

use App\Models\Region;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Regions\RegionResource;

class CreateRegion extends CreateRecord
{
    protected static string $resource = RegionResource::class;

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
