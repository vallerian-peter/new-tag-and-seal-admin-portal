<?php

namespace App\Filament\Resources\Inseminations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InseminationsTable
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
                TextColumn::make('serial')
                    ->searchable(),
                TextColumn::make('last_heat_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('current_heat_type_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('insemination_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('insemination_service_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('insemination_semen_straw_type_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('bull_code')
                    ->searchable(),
                TextColumn::make('bull_breed')
                    ->searchable(),
                TextColumn::make('semen_production_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('production_country')
                    ->searchable(),
                TextColumn::make('semen_batch_number')
                    ->searchable(),
                TextColumn::make('international_id')
                    ->searchable(),
                TextColumn::make('ai_code')
                    ->searchable(),
                TextColumn::make('manufacturer_name')
                    ->searchable(),
                TextColumn::make('semen_supplier')
                    ->searchable(),
                TextColumn::make('state_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_by')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('updated_by')
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
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
