<?php

namespace App\Filament\Resources\Vets\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class VetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('registration_no')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('phone_1')
                    ->tel()
                    ->required(),
                TextInput::make('phone_2')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('address')
                    ->default(null),
                TextInput::make('medical_licence_no')
                    ->default(null),
                DatePicker::make('date_of_birth'),
                TextInput::make('gender_id')
                    ->required()
                    ->numeric(),
                TextInput::make('identity_card_type_id')
                    ->required()
                    ->numeric(),
                TextInput::make('identity_number')
                    ->default(null),
                TextInput::make('school_level_id')
                    ->required()
                    ->numeric(),
                TextInput::make('country_id')
                    ->numeric()
                    ->default(1),
                TextInput::make('region_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('district_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                TextInput::make('updated_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('status_id')
                    ->required()
                    ->numeric(),
                Toggle::make('is_verified')
                    ->required(),
            ]);
    }
}
