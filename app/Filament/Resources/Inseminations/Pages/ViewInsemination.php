<?php

namespace App\Filament\Resources\Inseminations\Pages;

use App\Filament\Resources\Inseminations\InseminationResource;
use App\Filament\Resources\Inseminations\Schemas\InseminationViewSchema;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;

class ViewInsemination extends ViewRecord
{
    protected static string $resource = InseminationResource::class;

    protected function getContentWidth(): ?string
    {
        return 'full';
    }

    public function form(Schema $schema): Schema
    {
        Log::info('ViewInsemination: Rendering insemination view', [
            'insemination_id' => $this->getRecord()->id,
            'reference_no' => $this->getRecord()->reference_no,
            'viewer_id' => auth()->id(),
        ]);

        return InseminationViewSchema::configure($schema, $this->getRecord());
    }
}
