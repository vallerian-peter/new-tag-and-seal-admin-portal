<?php

namespace App\Filament\Resources\Dewormings\Pages;

use App\Filament\Resources\Dewormings\DewormingResource;
use App\Filament\Resources\Dewormings\Schemas\DewormingViewSchema;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;

class ViewDeworming extends ViewRecord
{
    protected static string $resource = DewormingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function infolist(Schema $schema): Schema
    {
        return DewormingViewSchema::configure($schema, $this->record);
    }
}
