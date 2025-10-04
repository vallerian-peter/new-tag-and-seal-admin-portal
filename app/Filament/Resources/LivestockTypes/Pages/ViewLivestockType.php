<?php

namespace App\Filament\Resources\LivestockTypes\Pages;

use App\Filament\Resources\LivestockTypes\LivestockTypeResource;
use App\Filament\Resources\LivestockTypes\Schemas\LivestockTypeViewSchema;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;

class ViewLivestockType extends ViewRecord
{
    protected static string $resource = LivestockTypeResource::class;

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
        return LivestockTypeViewSchema::configure($schema, $this->getRecord());
    }
}
