<?php

namespace App\Filament\Resources\Vaccinations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class VaccinationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('uuid')
                    ->default(fn () => \Illuminate\Support\Str::uuid()->toString()),

                TextInput::make('vaccination_no')
                    ->required()
                    ->label('Vaccination Number')
                    ->maxLength(255),

                Select::make('livestock_id')
                    ->relationship('livestock', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Livestock'),

                Select::make('vaccine_id')
                    ->relationship('vaccine', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Vaccine'),

                Select::make('disease_id')
                    ->relationship('disease', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Disease'),

                Select::make('vet_id')
                    ->relationship('vet', 'username')
                    ->searchable()
                    ->preload()
                    ->label('Veterinarian'),

                Select::make('extension_officer_id')
                    ->relationship('extensionOfficer', 'username')
                    ->searchable()
                    ->preload()
                    ->label('Extension Officer'),

                Select::make('created_by')
                    ->relationship('createdBy', 'username')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Created By'),

                Select::make('updated_by')
                    ->relationship('updatedBy', 'username')
                    ->searchable()
                    ->preload()
                    ->label('Updated By'),

                Select::make('vaccination_status_id')
                    ->relationship('vaccinationStatus', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Vaccination Status'),
            ]);
    }
}
