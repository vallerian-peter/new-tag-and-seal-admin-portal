<?php

namespace App\Filament\Resources\Vaccines\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class VaccineForm
{
    public static function configure(Schema $schema, bool $isEdit = false): Schema
    {
        return $schema
            ->components([
                Section::make('Vaccine Information')
                    ->schema([
                        Hidden::make('uuid')
                            ->default(fn () => \Illuminate\Support\Str::uuid()->toString()),

                        TextInput::make('name')
                            ->label('Vaccine Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('lot')
                            ->label('Lot Number')
                            ->maxLength(255),

                        Select::make('formulation_type')
                            ->label('Formulation Type')
                            ->options([
                                'live-attenuated' => 'Live Attenuated',
                                'inactivated' => 'Inactivated',
                                'subunit' => 'Subunit',
                                'toxoid' => 'Toxoid',
                                'conjugate' => 'Conjugate',
                            ])
                            ->searchable(),

                        TextInput::make('dose')
                            ->label('Dose')
                            ->required()
                            ->maxLength(255),

                        Select::make('vaccine_status_id')
                            ->label('Vaccine Status')
                            ->relationship('vaccineStatus', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Select::make('vaccine_type_id')
                            ->label('Vaccine Type')
                            ->relationship('vaccineType', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Select::make('vaccine_schedule_id')
                            ->label('Vaccine Schedule')
                            ->relationship('vaccineSchedule', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),

                        Select::make('farm_id')
                            ->label('Assigned to Farm')
                            ->relationship('farm', 'name')
                            ->searchable()
                            ->preload()
                            ->helperText('Select the farm this vaccine is assigned to'),
                    ])
                    ->columns(2),

                Section::make('Diseases This Vaccine Treats')
                    ->description('Select the diseases that this vaccine prevents or treats')
                    ->schema([
                        Repeater::make('vaccineDiseases')
                            ->label('Diseases')
                            ->relationship('vaccineDiseases')
                            ->schema([
                                Select::make('disease_id')
                                    ->label('Disease')
                                    ->relationship('disease', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->distinct()
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems(),

                                Hidden::make('created_by')
                                    ->default(auth()->user()->id ?? 1),
                            ])
                            ->columns(1)
                            ->defaultItems(1)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string =>
                                'Disease Assignment'
                            )
                            ->addActionLabel('Add Another Disease')
                            ->reorderable(false),
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
