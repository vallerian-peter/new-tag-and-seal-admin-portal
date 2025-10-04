<?php

namespace App\Filament\Resources\Calvings\Pages;

use App\Filament\Resources\Calvings\CalvingResource;
use App\Filament\Resources\Calvings\Schemas\CalvingViewSchema;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;

class ViewCalving extends ViewRecord
{
    protected static string $resource = CalvingResource::class;

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
        Log::info('ViewCalving: Rendering calving view', [
            'calving_id' => $this->getRecord()->id,
            'reference_no' => $this->getRecord()->reference_no,
            'livestock_name' => $this->getRecord()->livestock?->name,
            'farm_name' => $this->getRecord()->farm?->name,
            'viewer_id' => auth()->id(),
        ]);

        return CalvingViewSchema::configure($schema, $this->getRecord());
    }
}
