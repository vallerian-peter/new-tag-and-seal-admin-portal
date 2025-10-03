<?php

namespace App\Filament\Resources\Villages\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class VillageForm
{
    public static function configure(Schema $schema, bool $isEdit = false): Schema
    {
        return $schema
            ->components([
                Section::make('Village Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Village Name')
                            ->required()
                            ->maxLength(255),

                        // TextInput::make('code')
                        //     ->label('Village Code')
                        //     ->maxLength(50),

                        Select::make('ward_id')
                            ->label('Ward')
                            ->relationship('ward', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        // Select::make('district_id')
                        //     ->label('District')
                        //     ->relationship('district', 'name')
                        //     ->searchable()
                        //     ->preload(),

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
