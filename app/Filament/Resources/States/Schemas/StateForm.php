<?php

namespace App\Filament\Resources\States\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StateForm
{
    public static function configure(Schema $schema, bool $isEdit = false): Schema
    {
        return $schema
            ->components([
                Section::make('State Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('State Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('code')
                            ->label('State Code')
                            ->maxLength(50),

                        Select::make('country_id')
                            ->label('Country')
                            ->relationship('country', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->default(1),
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
