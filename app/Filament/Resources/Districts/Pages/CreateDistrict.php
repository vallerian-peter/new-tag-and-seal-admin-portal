<?php

namespace App\Filament\Resources\Districts\Pages;

use App\Models\District;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Districts\DistrictResource;

class CreateDistrict extends CreateRecord
{
    protected static string $resource = DistrictResource::class;

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
