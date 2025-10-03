<?php

namespace App\Filament\Resources\Farmers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;

class FarmerForm
{
    public static function configure(Schema $schema, bool $isEdit = false): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Information')
                    ->schema([
                        TextInput::make('farmer_no')
                            ->label('Farmer Number')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: $isEdit),

                        TextInput::make('first_name')
                            ->label('First Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('middle_name')
                            ->label('Middle Name')
                            ->maxLength(255),

                        TextInput::make('surname')
                            ->label('Surname')
                            ->required()
                            ->maxLength(255),

                        DatePicker::make('date_of_birth')
                            ->label('Date of Birth')
                            ->displayFormat('d/m/Y'),

                        Select::make('gender_id')
                            ->label('Gender')
                            ->relationship('gender', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                    ])
                    ->columns(3),

                Section::make('Contact Information')
                    ->schema([
                        TextInput::make('phone_1')
                            ->label('Primary Phone')
                            ->required()
                            ->tel()
                            ->maxLength(255),

                        TextInput::make('phone_2')
                            ->label('Secondary Phone')
                            ->tel()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255),

                        Textarea::make('physical_address')
                            ->label('Physical Address')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Identity Information')
                    ->schema([
                        Select::make('identity_card_type_id')
                            ->label('Identity Card Type')
                            ->relationship('idCardType', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                        TextInput::make('identity_number')
                            ->label('Identity Number')
                            ->maxLength(255),

                        Select::make('school_level_id')
                            ->label('School Level')
                            ->relationship('schoolLevel', 'name')
                            ->searchable()
                            ->preload(),
                    ])
                    ->columns(3),

                Section::make('Location Information')
                    ->schema([
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

                Section::make('Farmer Details')
                    ->schema([
                        Select::make('farmer_type_id')
                            ->label('Farmer Type')
                            ->relationship('farmerType', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                        TextInput::make('farmer_organization_membership')
                            ->label('Organization Membership')
                            ->maxLength(255),

                        Select::make('farmer_status_id')
                            ->label('Farmer Status')
                            ->relationship('status', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Toggle::make('is_verified')
                            ->label('Is Verified')
                            ->default(false),
                    ])
                    ->columns(2),

                Section::make('System Information')
                    ->schema([
                        TextInput::make('created_by')
                            ->hidden()
                            ->default(auth()->user()->id),

                        TextInput::make('updated_by')
                            ->hidden()
                            ->default(auth()->user()->id),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
            ]);
    }
}
