<?php

namespace App\Filament\Resources\Inseminations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InseminationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reference_no')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('livestock.name')
                    ->label('Livestock')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('serial')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('last_heat_date')
                    ->date()
                    ->sortable(),

                TextColumn::make('currentHeatType.name')
                    ->label('Heat Type')
                    ->sortable(),

                TextColumn::make('insemination_date')
                    ->date()
                    ->sortable(),

                TextColumn::make('inseminationService.name')
                    ->label('Service')
                    ->sortable(),

                TextColumn::make('bull_code')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('bull_breed')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('semen_production_date')
                    ->date()
                    ->sortable(),

                TextColumn::make('production_country')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('manufacturer_name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('state.name')
                    ->label('State')
                    ->sortable(),

                TextColumn::make('createdBy.username')
                    ->label('Created By')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
