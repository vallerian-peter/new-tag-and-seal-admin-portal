<?php

namespace App\Filament\Resources\Medications\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Table;

class MedicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(function () {
                return \App\Models\Medication::query()
                    ->with(['farm', 'livestock', 'disease', 'medicine', 'quantityUnit', 'withdrawalPeriodUnit', 'state', 'createdBy', 'updatedBy']);
            })
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->getStateUsing(function ($record, $rowLoop) {
                        return $rowLoop->iteration;
                    })
                    ->sortable(),

                TextColumn::make('reference_no')
                    ->searchable()
                    ->sortable()
                    ->label('Reference No')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('livestock.name')
                    ->label('Livestock')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('farm.name')
                    ->label('Farm')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('medicine.name')
                    ->label('Medicine')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('disease.name')
                    ->label('Disease')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('quantity')
                    ->label('Quantity')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn ($record) => $record->quantity . ' ' . ($record->quantityUnit->name ?? '')),

                TextColumn::make('medication_date')
                    ->label('Medication Date')
                    ->date()
                    ->sortable(),

                TextColumn::make('withdrawal_period')
                    ->label('Withdrawal Period')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn ($record) => $record->withdrawal_period . ' ' . ($record->withdrawalPeriodUnit->name ?? '')),

                TextColumn::make('state.name')
                    ->label('State')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('createdBy.name')
                    ->label('Created By')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updatedBy.name')
                    ->label('Updated By')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

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
                    })
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Updated At')
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

                SelectFilter::make('livestock_id')
                    ->label('Livestock')
                    ->relationship('livestock', 'name')
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

                Filter::make('medication_date')
                    ->form([
                        DatePicker::make('medication_from')
                            ->label('Medication From'),
                        DatePicker::make('medication_until')
                            ->label('Medication Until'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['medication_from'],
                                fn ($query, $date) => $query->whereDate('medication_date', '>=', $date),
                            )
                            ->when(
                                $data['medication_until'],
                                fn ($query, $date) => $query->whereDate('medication_date', '<=', $date),
                            );
                    })
                    ->label('Medication Date Range'),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make()
                        ->label('View Details'),
                    EditAction::make()
                        ->label('Edit'),
                    DeleteAction::make()
                        ->label('Delete')
                        ->requiresConfirmation()
                        ->modalHeading('Delete Medication Record')
                        ->modalDescription('Are you sure you want to delete this medication record? This action cannot be undone.')
                        ->modalSubmitActionLabel('Delete')
                        ->modalCancelActionLabel('Cancel'),
                ])
                ->icon('heroicon-m-ellipsis-vertical')
                ->size('sm')
                ->color('gray'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
