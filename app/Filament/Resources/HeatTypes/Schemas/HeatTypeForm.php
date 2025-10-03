<?php

namespace App\Filament\Resources\HeatTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HeatTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('color')
                    ->required(),
            ]);
    }
}
