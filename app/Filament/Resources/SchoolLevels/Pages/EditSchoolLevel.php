<?php

namespace App\Filament\Resources\SchoolLevels\Pages;

use App\Models\SchoolLevel;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use App\Filament\Resources\SchoolLevels\SchoolLevelResource;

class EditSchoolLevel extends EditRecord
{
    protected static string $resource = SchoolLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_by'] = auth()->user()->id ?? 1;

        return $data;
    }

    public function form(Schema $schema): Schema
    {
        return SchoolLevelResource::editForm($schema);
    }
}
