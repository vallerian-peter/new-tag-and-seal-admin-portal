<?php

namespace App\Filament\Resources\LivestockObtainedMethods\Pages;

use App\Filament\Resources\LivestockObtainedMethods\LivestockObtainedMethodResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLivestockObtainedMethod extends EditRecord
{
    protected static string $resource = LivestockObtainedMethodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
