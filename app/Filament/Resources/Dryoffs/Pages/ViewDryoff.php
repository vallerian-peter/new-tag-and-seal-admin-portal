<?php

namespace App\Filament\Resources\Dryoffs\Pages;

use App\Filament\Resources\Dryoffs\DryoffResource;
use App\Filament\Resources\Dryoffs\Schemas\DryoffViewSchema;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;

class ViewDryoff extends ViewRecord
{
    protected static string $resource = DryoffResource::class;

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
        Log::info('ViewDryoff: Rendering dryoff view', [
            'dryoff_id' => $this->getRecord()->id,
            'reference_no' => $this->getRecord()->reference_no,
            'livestock_name' => $this->getRecord()->livestock?->name,
            'farm_name' => $this->getRecord()->farm?->name,
            'start_date' => $this->getRecord()->start_date?->format('Y-m-d'),
            'viewer_id' => auth()->id(),
        ]);

        return DryoffViewSchema::configure($schema, $this->getRecord());
    }
}
