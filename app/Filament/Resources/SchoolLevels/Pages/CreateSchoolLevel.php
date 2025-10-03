<?php

namespace App\Filament\Resources\SchoolLevels\Pages;

use App\Models\SchoolLevel;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\SchoolLevels\SchoolLevelResource;

class CreateSchoolLevel extends CreateRecord
{
    protected static string $resource = SchoolLevelResource::class;

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
