<?php

namespace App\Filament\Resources\Vaccinations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VaccinationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('vaccination_no')
                    ->required(),
                TextInput::make('livestock_id')
                    ->required()
                    ->numeric(),
                TextInput::make('vaccine_id')
                    ->required()
                    ->numeric(),
                TextInput::make('disease_id')
                    ->required()
                    ->numeric(),
                TextInput::make('vet_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('extension_officer_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                TextInput::make('updated_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('vaccination_status_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
