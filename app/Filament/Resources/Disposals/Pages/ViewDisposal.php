<?php

namespace App\Filament\Resources\Disposals\Pages;

use App\Filament\Resources\Disposals\DisposalResource;
use App\Filament\Resources\Disposals\Schemas\DisposalViewSchema;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;

class ViewDisposal extends ViewRecord
{
    protected static string $resource = DisposalResource::class;

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
        Log::info('ViewDisposal: Rendering disposal view', [
            'disposal_id' => $this->getRecord()->id,
            'reference_no' => $this->getRecord()->reference_no,
            'livestock_name' => $this->getRecord()->livestock?->name,
            'farm_name' => $this->getRecord()->farm?->name,
            'disposal_type' => $this->getRecord()->disposalType?->name,
            'viewer_id' => auth()->id(),
        ]);

        return DisposalViewSchema::configure($schema, $this->getRecord());
    }
}
