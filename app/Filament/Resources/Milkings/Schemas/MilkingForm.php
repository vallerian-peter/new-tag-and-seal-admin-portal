<?php

namespace App\Filament\Resources\Milkings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MilkingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('reference_no')
                    ->required(),
                TextInput::make('livestock_id')
                    ->required()
                    ->numeric(),
                TextInput::make('milking_session_id')
                    ->required()
                    ->numeric(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('lactometer_reading')
                    ->required()
                    ->numeric(),
                TextInput::make('solid')
                    ->required(),
                TextInput::make('solid_non_fat')
                    ->required(),
                TextInput::make('protein')
                    ->required(),
                TextInput::make('corrected_lactometer_reading')
                    ->required(),
                TextInput::make('total_solids')
                    ->required(),
                TextInput::make('colony_forming_units')
                    ->required(),
                TextInput::make('acidity')
                    ->default(null),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                TextInput::make('updated_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('milking_status_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('milking_method_id')
                    ->required()
                    ->numeric(),
                TextInput::make('milking_unit_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
