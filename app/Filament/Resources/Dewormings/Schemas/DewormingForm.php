<?php

namespace App\Filament\Resources\Dewormings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Schemas\Schema;

class DewormingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('uuid')
                    ->default(fn () => \Illuminate\Support\Str::uuid()->toString()),

                TextInput::make('reference_no')
                    ->label('Reference Number')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Select::make('farm_id')
                    ->label('Farm')
                    ->relationship('farm', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                Select::make('livestock_id')
                    ->label('Livestock')
                    ->relationship('livestock', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                Select::make('medicine_id')
                    ->label('Medicine')
                    ->relationship('medicine', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                TextInput::make('quantity')
                    ->label('Quantity')
                    ->required()
                    ->numeric()
                    ->step(0.01),

                Select::make('quantity_unit_id')
                    ->label('Quantity Unit')
                    ->relationship('quantityUnit', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                TextInput::make('dose')
                    ->label('Dose')
                    ->required()
                    ->maxLength(255),

                TextInput::make('administration_route')
                    ->label('Administration Route')
                    ->required()
                    ->maxLength(255),

                DatePicker::make('next_administration_date')
                    ->label('Next Administration Date')
                    ->required()
                    ->native(false),

                Select::make('vet_id')
                    ->label('Veterinarian')
                    ->relationship('vet', 'username')
                    ->searchable()
                    ->preload(),

                Select::make('extension_officer_id')
                    ->label('Extension Officer')
                    ->relationship('extensionOfficer', 'username')
                    ->searchable()
                    ->preload(),

                Textarea::make('remarks')
                    ->label('Remarks')
                    ->maxLength(255)
                    ->rows(3),

                Select::make('state_id')
                    ->label('State')
                    ->relationship('state', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                Select::make('created_by')
                    ->relationship('createdBy', 'username')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Created By'),

                Select::make('updated_by')
                    ->relationship('updatedBy', 'username')
                    ->searchable()
                    ->preload()
                    ->label('Updated By'),

                Select::make('sync_status')
                    ->label('Sync Status')
                    ->options([
                        'pending' => 'Pending',
                        'synced' => 'Synced',
                        'conflict' => 'Conflict',
                        'deleted' => 'Deleted',
                    ])
                    ->default('pending'),

                TextInput::make('device_id')
                    ->label('Device ID')
                    ->maxLength(255),
            ]);
    }
}
