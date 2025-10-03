<?php

namespace App\Filament\Resources\Wards\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class WardForm
{
    public static function configure(Schema $schema, bool $isEdit = false): Schema
    {
        return $schema
            ->components([
                Section::make('Ward Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Ward Name')
                            ->required()
                            ->maxLength(255),

                        // TextInput::make('code')
                        //     ->label('Ward Code')
                        //     ->maxLength(50),

                        Select::make('district_id')
                            ->label('District')
                            ->relationship('district', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

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
