<?php

namespace App\Filament\Resources\Districts\Pages;

use App\Models\District;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use App\Filament\Resources\Districts\DistrictResource;

class EditDistrict extends EditRecord
{
    protected static string $resource = DistrictResource::class;

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
        return DistrictResource::editForm($schema);
    }
}
