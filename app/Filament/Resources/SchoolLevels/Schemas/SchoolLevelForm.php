<?php

namespace App\Filament\Resources\SchoolLevels\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class SchoolLevelForm
{
    public static function configure(Schema $schema, bool $isEdit = false): Schema
    {
        return $schema
            ->components([
                Section::make('School Level Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('School Level Name')
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
