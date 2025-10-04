<?php

namespace App\Filament\Resources\Disposals\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DisposalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Hidden::make('uuid')
                    ->default(fn () => \Illuminate\Support\Str::uuid()->toString()),

                TextInput::make('reference_no')
                    ->label('Reference Number')
                    ->required()
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

                Select::make('animal_disposal_type_id')
                    ->label('Disposal Type')
                    ->relationship('disposalType', 'name')
                    ->searchable()
                    ->preload(),

                Textarea::make('reasons')
                    ->label('Reasons')
                    ->rows(3)
                    ->columnSpanFull(),

                Checkbox::make('meat_obtained')
                    ->label('Meat Obtained'),

                Select::make('vet_id')
                    ->label('Vet')
                    ->relationship('vet', 'name')
                    ->searchable()
                    ->preload(),

                Select::make('extension_officer_id')
                    ->label('Extension Officer')
                    ->relationship('extensionOfficer', 'name')
                    ->searchable()
                    ->preload(),

                Select::make('state_id')
                    ->label('State')
                    ->relationship('state', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),

                Textarea::make('remarks')
                    ->label('Remarks')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
