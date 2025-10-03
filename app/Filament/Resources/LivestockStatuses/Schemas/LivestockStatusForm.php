<?php

namespace App\Filament\Resources\LivestockStatuses\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LivestockStatusForm
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
