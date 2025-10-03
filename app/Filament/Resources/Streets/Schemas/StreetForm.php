<?php

namespace App\Filament\Resources\Streets\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class StreetForm
{
    public static function configure(Schema $schema, bool $isEdit = false): Schema
    {
        return $schema
            ->components([
                Section::make('Street Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Street Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('code')
                            ->label('Street Code')
                            ->maxLength(50),

                        Select::make('village_id')
                            ->label('Village')
                            ->relationship('village', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('ward_id')
                            ->label('Ward')
                            ->relationship('ward', 'name')
                            ->searchable()
                            ->preload(),

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
