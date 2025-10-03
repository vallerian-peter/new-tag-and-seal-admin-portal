<?php

namespace App\Filament\Resources\Medications\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MedicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(function () {
                return \App\Models\Medication::query()
                    ->with(['farm', 'livestock', 'disease', 'medicine', 'quantityUnit', 'withdrawalPeriodUnit', 'state']);
            })
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->getStateUsing(function ($record, $rowLoop) {
                        return $rowLoop->iteration;
                    })
                    ->sortable(),

                TextColumn::make('livestock.name')
                    ->label('Livestock Name')
                    ->getStateUsing(function ($record) {
                        return $record->livestock ? $record->livestock->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('farm.name')
                    ->label('Farm Name')
                    ->getStateUsing(function ($record) {
                        return $record->farm ? $record->farm->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('livestock.owner')
                    ->label('Owner Name')
                    ->getStateUsing(function ($record) {
                        if ($record->livestock && $record->livestock->owner) {
                            return $record->livestock->owner->first_name . ' ' . $record->livestock->owner->last_name;
                        }
                        return 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('medicine.name')
                    ->label('Medicine')
                    ->getStateUsing(function ($record) {
                        return $record->medicine ? $record->medicine->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('disease.name')
                    ->label('Disease')
                    ->getStateUsing(function ($record) {
                        return $record->disease ? $record->disease->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('quantity')
                    ->label('Quantity')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('quantityUnit.name')
                    ->label('Unit')
                    ->getStateUsing(function ($record) {
                        return $record->quantityUnit ? $record->quantityUnit->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('medication_date')
                    ->label('Medication Date')
                    ->date()
                    ->sortable(),

                TextColumn::make('remarks')
                    ->label('Remarks')
                    ->searchable()
                    ->limit(30)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 30) {
                            return null;
                        }
                        return $state;
                    }),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('farm_id')
                    ->label('Farm')
                    ->relationship('farm', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('disease_id')
                    ->label('Disease')
                    ->relationship('disease', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('medicine_id')
                    ->label('Medicine')
                    ->relationship('medicine', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('state_id')
                    ->label('State')
                    ->relationship('state', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
