<?php

namespace App\Filament\Resources\Villages\Pages;

use App\Models\Village;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use App\Filament\Resources\Villages\VillageResource;

class EditVillage extends EditRecord
{
    protected static string $resource = VillageResource::class;

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
        return VillageResource::editForm($schema);
    }
}
