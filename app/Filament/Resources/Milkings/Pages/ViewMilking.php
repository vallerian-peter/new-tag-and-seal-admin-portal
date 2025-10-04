<?php

namespace App\Filament\Resources\Milkings\Pages;

use App\Filament\Resources\Milkings\MilkingResource;
use App\Filament\Resources\Milkings\Schemas\MilkingViewSchema;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;

class ViewMilking extends ViewRecord
{
    protected static string $resource = MilkingResource::class;

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
        Log::info('ViewMilking: Rendering milking view', [
            'milking_id' => $this->getRecord()->id,
            'reference_no' => $this->getRecord()->reference_no,
            'livestock_id' => $this->getRecord()->livestock_id,
            'amount' => $this->getRecord()->amount,
            'viewer_id' => auth()->id(),
        ]);

        return MilkingViewSchema::configure($schema, $this->getRecord());
    }
}
