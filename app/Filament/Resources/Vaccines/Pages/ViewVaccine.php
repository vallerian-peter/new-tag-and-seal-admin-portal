<?php

namespace App\Filament\Resources\Vaccines\Pages;

use App\Filament\Resources\Vaccines\VaccineResource;
use App\Filament\Resources\Vaccines\Schemas\VaccineViewSchema;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;

class ViewVaccine extends ViewRecord
{
    protected static string $resource = VaccineResource::class;

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
        Log::info('ViewVaccine: Rendering vaccine view', [
            'vaccine_id' => $this->getRecord()->id,
            'name' => $this->getRecord()->name,
            'lot' => $this->getRecord()->lot,
            'farm_id' => $this->getRecord()->farm_id,
            'viewer_id' => auth()->id(),
        ]);

        return VaccineViewSchema::configure($schema, $this->getRecord());
    }
}
