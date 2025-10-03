<?php

namespace App\Filament\Resources\Wards\Pages;

use App\Models\Ward;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Wards\WardResource;

class CreateWard extends CreateRecord
{
    protected static string $resource = WardResource::class;

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
