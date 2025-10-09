<?php

namespace App\Filament\Resources\SemenStrawTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class SemenStrawTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Semen Straw Type Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Semen Straw Type Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('category')
                            ->label('Category')
                            ->required()
                            ->maxLength(255),

                        ColorPicker::make('color')
                            ->label('Color')
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }
}
