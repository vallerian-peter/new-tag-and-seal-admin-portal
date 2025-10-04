<?php

namespace App\Filament\Resources\Dryoffs\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DryoffForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Hidden::make('uuid')
                    ->default(fn () => \Illuminate\Support\Str::uuid()->toString()),

                TextInput::make('reference_no')
                    ->label('Reference Number')
                    ->required()
                    ->maxLength(255),

                Select::make('farm_id')
                    ->label('Farm')
                    ->relationship('farm', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                Select::make('livestock_id')
                    ->label('Livestock')
                    ->relationship('livestock', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                TextInput::make('serial')
                    ->label('Serial')
                    ->maxLength(255),

                DatePicker::make('start_date')
                    ->label('Start Date'),

                DatePicker::make('end_date')
                    ->label('End Date')
                    ->after('start_date'),

                DatePicker::make('expected_calving_date')
                    ->label('Expected Calving Date')
                    ->after('start_date'),

                Select::make('state_id')
                    ->label('State')
                    ->relationship('state', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
            ]);
    }
}
