<?php

namespace App\Filament\Resources\HeatTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class HeatTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Heat Type Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Heat Type Name')
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
