<?php

namespace App\Filament\Resources\Farmers\Pages;

use App\Filament\Resources\Farmers\FarmerResource;
use App\Filament\Resources\Farmers\Schemas\FarmerViewSchema;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Log;

class ViewFarmer extends ViewRecord
{
    protected static string $resource = FarmerResource::class;

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
        Log::info('ViewFarmer: Rendering farmer view', [
            'farmer_id' => $this->getRecord()->id,
            'farmer_name' => $this->getRecord()->first_name . ' ' . $this->getRecord()->surname,
            'farmer_no' => $this->getRecord()->farmer_no,
            'viewer_id' => auth()->id(),
        ]);

        return FarmerViewSchema::configure($schema, $this->getRecord());
    }
}
