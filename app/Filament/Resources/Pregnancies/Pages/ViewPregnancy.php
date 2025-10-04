<?php

namespace App\Filament\Resources\Pregnancies\Pages;

use App\Filament\Resources\Pregnancies\PregnancyResource;
use App\Filament\Resources\Pregnancies\Schemas\PregnancyViewSchema;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;

class ViewPregnancy extends ViewRecord
{
    protected static string $resource = PregnancyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    protected function getContentWidth(): ?string
    {
        return 'full';
    }

    public function form(Schema $schema): Schema
    {
        Log::info('ViewPregnancy: Rendering pregnancy view', [
            'pregnancy_id' => $this->getRecord()->id,
            'reference_no' => $this->getRecord()->reference_no,
            'livestock_name' => $this->getRecord()->livestock?->name,
            'farm_name' => $this->getRecord()->farm?->name,
            'test_result' => $this->getRecord()->testResult?->name,
            'viewer_id' => auth()->id(),
        ]);

        return PregnancyViewSchema::configure($schema, $this->getRecord());
    }
}
