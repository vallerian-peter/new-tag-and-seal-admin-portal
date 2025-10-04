<?php

namespace App\Filament\Resources\Weights\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WeightForm
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

                TextInput::make('weight')
                    ->label('Weight')
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01),

                TextInput::make('weight_gain')
                    ->label('Weight Gain')
                    ->numeric()
                    ->step(0.01),

                Select::make('weight_gain_unit_id')
                    ->label('Weight Unit')
                    ->relationship('weightUnit', 'name')
                    ->searchable()
                    ->preload(),

                Select::make('state_id')
                    ->label('State')
                    ->relationship('state', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                Textarea::make('remarks')
                    ->label('Remarks')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
