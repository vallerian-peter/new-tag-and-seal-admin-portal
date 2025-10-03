<?php

namespace App\Filament\Resources\SchoolLevels\Pages;

use App\Models\SchoolLevel;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SchoolLevels\SchoolLevelResource;

class ListSchoolLevels extends ListRecords
{
    protected static string $resource = SchoolLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
