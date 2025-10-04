<?php

namespace App\Filament\Resources\Vaccinations\Pages;

use App\Filament\Resources\Vaccinations\VaccinationResource;
use App\Filament\Resources\Vaccinations\Schemas\VaccinationViewSchema;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;

class ViewVaccination extends ViewRecord
{
    protected static string $resource = VaccinationResource::class;

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
        Log::info('ViewVaccination: Rendering vaccination view', [
            'vaccination_id' => $this->getRecord()->id,
            'vaccination_no' => $this->getRecord()->vaccination_no,
            'livestock_id' => $this->getRecord()->livestock_id,
            'vaccine_id' => $this->getRecord()->vaccine_id,
            'viewer_id' => auth()->id(),
        ]);

        return VaccinationViewSchema::configure($schema, $this->getRecord());
    }
}
