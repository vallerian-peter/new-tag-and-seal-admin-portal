<?php

namespace App\Filament\Resources\Milkings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MilkingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reference_no')
                    ->searchable(),
                TextColumn::make('livestock_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('milking_session_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('lactometer_reading')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('solid')
                    ->searchable(),
                TextColumn::make('solid_non_fat')
                    ->searchable(),
                TextColumn::make('protein')
                    ->searchable(),
                TextColumn::make('corrected_lactometer_reading')
                    ->searchable(),
                TextColumn::make('total_solids')
                    ->searchable(),
                TextColumn::make('colony_forming_units')
                    ->searchable(),
                TextColumn::make('acidity')
                    ->searchable(),
                TextColumn::make('created_by')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('updated_by')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('milking_status_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('milking_method_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('milking_unit_id')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
