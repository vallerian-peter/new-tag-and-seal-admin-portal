<?php

namespace App\Filament\Resources\SchoolLevels\Pages;

use App\Filament\Resources\SchoolLevels\SchoolLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSchoolLevel extends ViewRecord
{
    protected static string $resource = SchoolLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
