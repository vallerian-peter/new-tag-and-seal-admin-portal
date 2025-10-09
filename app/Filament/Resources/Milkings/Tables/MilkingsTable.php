<?php

namespace App\Filament\Resources\Milkings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Table;

class MilkingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
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
                    ->label('Reference No'),

                TextColumn::make('livestock.name')
                    ->searchable()
                    ->sortable()
                    ->label('Livestock'),

                TextColumn::make('milkingSession.name')
                    ->searchable()
                    ->sortable()
                    ->label('Session'),

                TextColumn::make('amount')
                    ->numeric(decimalPlaces: 2)
                    ->sortable()
                    ->label('Amount')
                    ->formatStateUsing(fn ($record) => $record->amount . ' ' . ($record->milkingUnit->name ?? '')),

                TextColumn::make('lactometer_reading')
                    ->numeric(decimalPlaces: 2)
                    ->sortable()
                    ->label('Lactometer'),

                TextColumn::make('solid')
                    ->numeric(decimalPlaces: 1)
                    ->sortable()
                    ->label('Solid %'),

                TextColumn::make('solid_non_fat')
                    ->numeric(decimalPlaces: 1)
                    ->sortable()
                    ->label('SNF %'),

                TextColumn::make('protein')
                    ->numeric(decimalPlaces: 1)
                    ->sortable()
                    ->label('Protein %'),

                TextColumn::make('corrected_lactometer_reading')
                    ->numeric(decimalPlaces: 2)
                    ->sortable()
                    ->label('Corrected LR')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('total_solids')
                    ->numeric(decimalPlaces: 1)
                    ->sortable()
                    ->label('Total Solids %')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('colony_forming_units')
                    ->numeric()
                    ->sortable()
                    ->label('CFU')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('acidity')
                    ->numeric(decimalPlaces: 1)
                    ->sortable()
                    ->label('Acidity %')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('milkingMethod.name')
                    ->searchable()
                    ->sortable()
                    ->label('Method')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('milkingUnit.name')
                    ->searchable()
                    ->sortable()
                    ->label('Unit')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('milkingStatus.name')
                    ->searchable()
                    ->sortable()
                    ->label('Status')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('createdBy.name')
                    ->searchable()
                    ->sortable()
                    ->label('Created By')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updatedBy.name')
                    ->searchable()
                    ->sortable()
                    ->label('Updated By')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Created At')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Updated At')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('livestock_id')
                    ->relationship('livestock', 'name')
                    ->searchable()
                    ->preload()
                    ->label('Livestock'),

                SelectFilter::make('milking_session_id')
                    ->relationship('milkingSession', 'name')
                    ->searchable()
                    ->preload()
                    ->label('Milking Session'),

                SelectFilter::make('milking_method_id')
                    ->relationship('milkingMethod', 'name')
                    ->searchable()
                    ->preload()
                    ->label('Milking Method'),

                SelectFilter::make('milking_unit_id')
                    ->relationship('milkingUnit', 'name')
                    ->searchable()
                    ->preload()
                    ->label('Milking Unit'),

                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')
                            ->label('Created From'),
                        DatePicker::make('created_until')
                            ->label('Created Until'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn ($query, $date) => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn ($query, $date) => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->label('Created Date Range'),
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
                        ->modalHeading('Delete Milking Record')
                        ->modalDescription('Are you sure you want to delete this milking record? This action cannot be undone.')
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
