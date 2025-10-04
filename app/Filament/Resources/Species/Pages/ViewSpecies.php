<?php

namespace App\Filament\Resources\Species\Pages;

use App\Filament\Resources\Species\SpeciesResource;
use App\Filament\Resources\Species\Schemas\SpeciesViewSchema;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;

class ViewSpecies extends ViewRecord
{
    protected static string $resource = SpeciesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    protected function getContentWidth(): ?string
    {
        return 'full';
    }

    public function form(Schema $schema): Schema
    {
        return SpeciesViewSchema::configure($schema, $this->getRecord());
    }
}
