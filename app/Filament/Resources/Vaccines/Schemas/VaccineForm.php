<?php

namespace App\Filament\Resources\Vaccines\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VaccineForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('lot')
                    ->default(null),
                Select::make('formulation_type')
                    ->options(['live-attenuated' => 'Live attenuated', 'inactivated' => 'Inactivated'])
                    ->default(null),
                TextInput::make('dose')
                    ->required(),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                TextInput::make('updated_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('vaccine_status_id')
                    ->required()
                    ->numeric(),
                TextInput::make('vaccine_type_id')
                    ->required()
                    ->numeric(),
                TextInput::make('vaccine_schedule_id')
                    ->required()
                    ->numeric(),
                TextInput::make('farm_id')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
