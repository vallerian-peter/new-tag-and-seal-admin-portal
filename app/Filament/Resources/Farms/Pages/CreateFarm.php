<?php

namespace App\Filament\Resources\Farms\Pages;

use App\Models\Farm;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Schemas\Schema;
use App\Filament\Resources\Farms\FarmResource;

class CreateFarm extends CreateRecord
{
    protected static string $resource = FarmResource::class;

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
