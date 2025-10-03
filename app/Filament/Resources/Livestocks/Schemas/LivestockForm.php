<?php

namespace App\Filament\Resources\Livestocks\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LivestockForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('identification_number')
                    ->required(),
                TextInput::make('livestock_type_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('name')
                    ->required(),
                TextInput::make('date_of_birth')
                    ->required(),
                TextInput::make('mother_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('father_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('gender_id')
                    ->required()
                    ->numeric(),
                TextInput::make('breed_id')
                    ->required()
                    ->numeric(),
                TextInput::make('species_id')
                    ->required()
                    ->numeric(),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                TextInput::make('updated_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('livestock_status_id')
                    ->required()
                    ->numeric(),
                TextInput::make('livestock_obtained_method_id')
                    ->numeric()
                    ->default(null),
                DateTimePicker::make('date_first_entered_to_farm'),
                TextInput::make('weight_as_on_registration')
                    ->default(null),
                TextInput::make('total_milk_produced')
                    ->default(null),
                TextInput::make('parity_lactacting_number')
                    ->default(null),
                DateTimePicker::make('date_of_last_calving'),
            ]);
    }
}
