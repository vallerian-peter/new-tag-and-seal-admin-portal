<?php

namespace App\Filament\Resources\Breeds\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BreedForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('color')
                    ->default(null),
                TextInput::make('group')
                    ->required(),
                TextInput::make('livestock_type_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
