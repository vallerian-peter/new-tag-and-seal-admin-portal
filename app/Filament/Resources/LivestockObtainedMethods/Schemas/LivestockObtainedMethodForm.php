<?php

namespace App\Filament\Resources\LivestockObtainedMethods\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class LivestockObtainedMethodForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Livestock Obtained Method Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Method Name')
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
