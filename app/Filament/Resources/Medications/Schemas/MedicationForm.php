<?php

namespace App\Filament\Resources\Medications\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MedicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('quantity')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('withdrawal_period')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('remarks')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                TextInput::make('updated_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('state_id')
                    ->required()
                    ->numeric(),
                TextInput::make('farm_id')
                    ->required()
                    ->numeric(),
                TextInput::make('disease_id')
                    ->required()
                    ->numeric(),
                TextInput::make('livestock_id')
                    ->required()
                    ->numeric(),
                TextInput::make('medicine_id')
                    ->required()
                    ->numeric(),
                TextInput::make('quantity_unit_id')
                    ->required()
                    ->numeric(),
                TextInput::make('withdrawal_period_unit_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('medication_date')
                    ->required(),
            ]);
    }
}
