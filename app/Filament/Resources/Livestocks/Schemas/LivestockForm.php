<?php

namespace App\Filament\Resources\Livestocks\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class LivestockForm
{
    public static function configure(Schema $schema, bool $isEdit = false): Schema
    {
        return $schema
            ->components([
                Section::make('Livestock Information')
                    ->schema([
                        TextInput::make('identification_number')
                            ->label('Identification Number')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('name')
                            ->label('Livestock Name')
                            ->required()
                            ->maxLength(255),

                        Select::make('livestock_type_id')
                            ->label('Livestock Type')
                            ->relationship('livestockType', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Select::make('species_id')
                            ->label('Species')
                            ->relationship('species', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Select::make('breed_id')
                            ->label('Breed')
                            ->relationship('breed', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Select::make('gender_id')
                            ->label('Gender')
                            ->relationship('gender', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                        TextInput::make('date_of_birth')
                            ->label('Date of Birth')
                            ->date()
                            ->required(),

                        Select::make('mother_id')
                            ->label('Mother')
                            ->relationship('mother', 'name')
                            ->searchable()
                            ->preload(),

                        Select::make('father_id')
                            ->label('Father')
                            ->relationship('father', 'name')
                            ->searchable()
                            ->preload(),

                        Select::make('livestock_status_id')
                            ->label('Status')
                            ->relationship('livestockStatus', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Select::make('livestock_obtained_method_id')
                            ->label('Obtained Method')
                            ->relationship('livestockObtainedMethod', 'name')
                            ->searchable()
                            ->preload(),
                    ])
                    ->columns(2),

                Section::make('Additional Information')
                    ->schema([
                        DateTimePicker::make('date_first_entered_to_farm')
                            ->label('Date First Entered to Farm'),

                        TextInput::make('weight_as_on_registration')
                            ->label('Weight on Registration')
                            ->numeric(),

                        TextInput::make('total_milk_produced')
                            ->label('Total Milk Produced')
                            ->numeric(),

                        TextInput::make('parity_lactacting_number')
                            ->label('Parity/Lactating Number'),

                        DateTimePicker::make('date_of_last_calving')
                            ->label('Date of Last Calving'),
                    ])
                    ->columns(2)
                    ->collapsible(),

                Section::make('Farm Assignments')
                    ->description('Assign this livestock to farms')
                    ->schema([
                        Repeater::make('farmLivestocks')
                            ->label('Farm Assignments')
                            ->relationship('farmLivestocks')
                            ->schema([
                                Select::make('farm_id')
                                    ->label('Farm')
                                    ->relationship('farm', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload(),

                                Select::make('state_id')
                                    ->label('Status')
                                    ->relationship('state', 'name')
                                    ->default(1)
                                    ->required()
                                    ->searchable()
                                    ->preload(),

                                Hidden::make('created_by')
                                    ->default(auth()->user()->id ?? 1),

                                Hidden::make('updated_by')
                                    ->default(auth()->user()->id ?? 1),
                            ])
                            ->columns(2)
                            ->defaultItems(0)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string =>
                                'Farm Assignment'
                            ),
                    ])
                    ->collapsible()
                    ->collapsed($isEdit),

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
