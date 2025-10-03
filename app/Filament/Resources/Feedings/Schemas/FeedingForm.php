<?php

namespace App\Filament\Resources\Feedings\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FeedingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('reference_no')
                    ->required(),
                TextInput::make('farm_id')
                    ->required()
                    ->numeric(),
                TextInput::make('livestock_id')
                    ->required()
                    ->numeric(),
                TextInput::make('feeding_type_id')
                    ->required()
                    ->numeric(),
                TextInput::make('amount')
                    ->default(null),
                TextInput::make('remarks')
                    ->required(),
                DateTimePicker::make('feeding_time')
                    ->required(),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                TextInput::make('updated_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('state_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
