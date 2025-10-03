<?php

namespace App\Filament\Resources\States\Pages;

use App\Models\State;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\States\StateResource;

class CreateState extends CreateRecord
{
    protected static string $resource = StateResource::class;

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
