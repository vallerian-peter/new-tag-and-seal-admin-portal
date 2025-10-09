<?php

namespace App\Filament\Resources\Breeds\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class BreedForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Breed Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Breed Name')
                            ->required()
                            ->maxLength(255),

                        ColorPicker::make('color')
                            ->label('Color'),

                        TextInput::make('group')
                            ->label('Group')
                            ->required()
                            ->maxLength(255),

                        Select::make('livestock_type_id')
                            ->label('Livestock Type')
                            ->relationship('livestockType', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                    ])
                    ->columns(2),
            ]);
    }
}
