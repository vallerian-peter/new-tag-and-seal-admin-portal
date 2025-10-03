<?php

namespace App\Filament\Resources\Inseminations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InseminationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('reference_no')
                    ->required(),
                TextInput::make('livestock_id')
                    ->required()
                    ->numeric(),
                TextInput::make('serial')
                    ->default(null),
                DatePicker::make('last_heat_date')
                    ->required(),
                TextInput::make('current_heat_type_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('insemination_date')
                    ->required(),
                TextInput::make('insemination_service_id')
                    ->required()
                    ->numeric(),
                TextInput::make('insemination_semen_straw_type_id')
                    ->required()
                    ->numeric(),
                TextInput::make('bull_code')
                    ->required(),
                TextInput::make('bull_breed')
                    ->required(),
                DatePicker::make('semen_production_date')
                    ->required(),
                TextInput::make('production_country')
                    ->required(),
                TextInput::make('semen_batch_number')
                    ->required(),
                TextInput::make('international_id')
                    ->required(),
                TextInput::make('ai_code')
                    ->required(),
                TextInput::make('manufacturer_name')
                    ->required(),
                TextInput::make('semen_supplier')
                    ->required(),
                TextInput::make('state_id')
                    ->required()
                    ->numeric(),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                TextInput::make('updated_by')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
