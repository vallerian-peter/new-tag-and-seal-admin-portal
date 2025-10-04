<?php

namespace App\Filament\Resources\Feedings\Pages;

use App\Filament\Resources\Feedings\FeedingResource;
use App\Filament\Resources\Feedings\Schemas\FeedingViewSchema;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;

class ViewFeeding extends ViewRecord
{
    protected static string $resource = FeedingResource::class;

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
        Log::info('ViewFeeding: Rendering feeding view', [
            'feeding_id' => $this->getRecord()->id,
            'reference_no' => $this->getRecord()->reference_no,
            'livestock_id' => $this->getRecord()->livestock_id,
            'feeding_time' => $this->getRecord()->feeding_time,
            'viewer_id' => auth()->id(),
        ]);

        return FeedingViewSchema::configure($schema, $this->getRecord());
    }
}
