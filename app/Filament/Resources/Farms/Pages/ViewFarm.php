<?php

namespace App\Filament\Resources\Farms\Pages;

use App\Filament\Resources\Farms\FarmResource;
use App\Filament\Resources\Farms\Schemas\FarmViewSchema;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;

class ViewFarm extends ViewRecord
{
    protected static string $resource = FarmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getContentWidth(): ?string
    {
        return 'full';
    }

    public function form(Schema $schema): Schema
    {
        return FarmViewSchema::configure($schema, $this->getRecord());
    }
}
