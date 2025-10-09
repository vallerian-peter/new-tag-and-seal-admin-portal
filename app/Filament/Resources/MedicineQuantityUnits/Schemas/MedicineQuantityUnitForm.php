<?php

namespace App\Filament\Resources\MedicineQuantityUnits\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class MedicineQuantityUnitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Medicine Quantity Unit Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Medicine Quantity Unit Name')
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
