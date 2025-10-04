<?php

namespace App\Filament\Resources\Weights\Pages;

use App\Filament\Resources\Weights\WeightResource;
use App\Filament\Resources\Weights\Schemas\WeightViewSchema;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;

class ViewWeight extends ViewRecord
{
    protected static string $resource = WeightResource::class;

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
        Log::info('ViewWeight: Rendering weight view', [
            'weight_id' => $this->getRecord()->id,
            'reference_no' => $this->getRecord()->reference_no,
            'livestock_name' => $this->getRecord()->livestock?->name,
            'farm_name' => $this->getRecord()->farm?->name,
            'weight' => $this->getRecord()->weight,
            'weight_gain' => $this->getRecord()->weight_gain,
            'viewer_id' => auth()->id(),
        ]);

        return WeightViewSchema::configure($schema, $this->getRecord());
    }
}
