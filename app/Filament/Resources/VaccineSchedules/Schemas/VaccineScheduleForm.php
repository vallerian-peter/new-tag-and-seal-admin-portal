<?php

namespace App\Filament\Resources\VaccineSchedules\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VaccineScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('color')
                    ->required(),
            ]);
    }
}
