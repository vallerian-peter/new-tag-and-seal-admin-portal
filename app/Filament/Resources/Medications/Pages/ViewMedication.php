<?php

namespace App\Filament\Resources\Medications\Pages;

use App\Filament\Resources\Medications\MedicationResource;
use App\Filament\Resources\Medications\Schemas\MedicationViewSchema;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;

class ViewMedication extends ViewRecord
{
    protected static string $resource = MedicationResource::class;

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
        Log::info('ViewMedication: Rendering medication view', [
            'medication_id' => $this->getRecord()->id,
            'livestock_id' => $this->getRecord()->livestock_id,
            'medicine_id' => $this->getRecord()->medicine_id,
            'medication_date' => $this->getRecord()->medication_date,
            'viewer_id' => auth()->id(),
        ]);

        return MedicationViewSchema::configure($schema, $this->getRecord());
    }
}
