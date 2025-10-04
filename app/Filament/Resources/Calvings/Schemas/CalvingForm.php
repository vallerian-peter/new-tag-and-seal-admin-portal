<?php

namespace App\Filament\Resources\Calvings\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CalvingForm
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

                Select::make('calving_type_id')
                    ->label('Calving Type')
                    ->relationship('calvingType', 'name')
                    ->searchable()
                    ->preload(),

                Select::make('calving_problems_id')
                    ->label('Calving Problem')
                    ->relationship('calvingProblem', 'name')
                    ->searchable()
                    ->preload(),

                Select::make('reproductive_problem_id')
                    ->label('Reproductive Problem')
                    ->relationship('reproductiveProblem', 'name')
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
