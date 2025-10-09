<?php

namespace App\Filament\Resources\Inseminations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InseminationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('uuid')
                    ->default(fn () => \Illuminate\Support\Str::uuid()->toString()),

                TextInput::make('reference_no')
                    ->required()
                    ->maxLength(255),

                Select::make('farm_id')
                    ->relationship('farm', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                Select::make('livestock_id')
                    ->relationship('livestock', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                TextInput::make('serial')
                    ->maxLength(255),

                DatePicker::make('last_heat_date')
                    ->required(),

                Select::make('current_heat_type_id')
                    ->relationship('currentHeatType', 'name')
                    ->searchable()
                    ->preload(),

                DatePicker::make('insemination_date')
                    ->required(),

                Select::make('insemination_service_id')
                    ->relationship('inseminationService', 'name')
                    ->searchable()
                    ->preload(),

                Select::make('insemination_semen_straw_type_id')
                    ->relationship('semenStrawType', 'name')
                    ->searchable()
                    ->preload(),

                TextInput::make('bull_code')
                    ->required()
                    ->maxLength(255),

                TextInput::make('bull_breed')
                    ->required()
                    ->maxLength(255),

                DatePicker::make('semen_production_date')
                    ->required(),

                TextInput::make('production_country')
                    ->required()
                    ->maxLength(255),

                TextInput::make('semen_batch_number')
                    ->required()
                    ->maxLength(255),

                TextInput::make('international_id')
                    ->required()
                    ->maxLength(255),

                TextInput::make('ai_code')
                    ->required()
                    ->maxLength(255),

                TextInput::make('manufacturer_name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('semen_supplier')
                    ->required()
                    ->maxLength(255),

                Select::make('state_id')
                    ->relationship('state', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                Select::make('created_by')
                    ->relationship('createdBy', 'username')
                    ->searchable()
                    ->preload(),

                Select::make('updated_by')
                    ->relationship('updatedBy', 'username')
                    ->searchable()
                    ->preload(),
            ]);
    }
}
