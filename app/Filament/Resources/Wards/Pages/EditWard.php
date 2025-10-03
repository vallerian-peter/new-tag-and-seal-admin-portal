<?php

namespace App\Filament\Resources\Wards\Pages;

use App\Models\Ward;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use App\Filament\Resources\Wards\WardResource;

class EditWard extends EditRecord
{
    protected static string $resource = WardResource::class;

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
        return WardResource::editForm($schema);
    }
}
