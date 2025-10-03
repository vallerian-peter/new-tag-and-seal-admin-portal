<?php

namespace App\Filament\Resources\States\Pages;

use App\Models\State;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use App\Filament\Resources\States\StateResource;

class EditState extends EditRecord
{
    protected static string $resource = StateResource::class;

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
        return StateResource::editForm($schema);
    }
}
