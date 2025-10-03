<?php

namespace App\Filament\Resources\Farms\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class FarmForm
{
    public static function configure(Schema $schema, bool $isEdit = false): Schema
    {
        return $schema
            ->components([
                Section::make('Farm Information')
                    ->schema([
                        TextInput::make('reference_no')
                            ->label('Reference Number')
                            ->required()
                            ->unique(ignoreRecord: $isEdit)
                            ->maxLength(255),

                        TextInput::make('regional_reg_no')
                            ->label('Regional Registration Number')
                            ->maxLength(255),

                        TextInput::make('name')
                            ->label('Farm Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('size')
                            ->label('Farm Size')
                            ->required()
                            ->maxLength(255),

                        Select::make('size_unit_id')
                            ->label('Size Unit')
                            ->relationship('sizeUnit', 'name')
                            ->searchable()
                            ->preload(),
                    ])
                    ->columns(2),

                Section::make('Location Information')
                    ->schema([
                        TextInput::make('latitudes')
                            ->label('Latitude')
                            ->maxLength(255),

                        TextInput::make('longitudes')
                            ->label('Longitude')
                            ->maxLength(255),

                        Textarea::make('physical_address')
                            ->label('Physical Address')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),

                        Select::make('street_id')
                            ->label('Street')
                            ->relationship('street', 'name')
                            ->searchable()
                            ->preload(),

                        Select::make('village_id')
                            ->label('Village')
                            ->relationship('village', 'name')
                            ->searchable()
                            ->preload(),

                        Select::make('ward_id')
                            ->label('Ward')
                            ->relationship('ward', 'name')
                            ->searchable()
                            ->preload(),

                        Select::make('division_id')
                            ->label('Division')
                            ->relationship('division', 'name')
                            ->searchable()
                            ->preload(),

                        Select::make('district_id')
                            ->label('District')
                            ->relationship('district', 'name')
                            ->searchable()
                            ->preload(),

                        Select::make('region_id')
                            ->label('Region')
                            ->relationship('region', 'name')
                            ->searchable()
                            ->preload(),

                        Select::make('country_id')
                            ->label('Country')
                            ->relationship('country', 'name')
                            ->searchable()
                            ->preload()
                            ->default(1),
                    ])
                    ->columns(3),

                Section::make('Farm Details')
                    ->schema([
                        Select::make('legal_status_id')
                            ->label('Legal Status')
                            ->relationship('legalStatus', 'name')
                            ->searchable()
                            ->preload(),

                        Select::make('farm_status_id')
                            ->label('Farm Status')
                            ->relationship('farmStatus', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Toggle::make('has_coordinates')
                            ->label('Has GPS Coordinates')
                            ->default(false),

                        TextInput::make('gps')
                            ->label('GPS Information')
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Section::make('System Information')
                    ->schema([
                        Hidden::make('created_by')
                            ->default(auth()->user()->id ?? 1),

                        Hidden::make('updated_by')
                            ->default(auth()->user()->id ?? 1),
                    ])
                    ->visible(false),
            ]);
    }
}
