<?php

namespace App\Filament\Resources\Inseminations\Tables;

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

class InseminationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->getStateUsing(function ($record, $rowLoop) {
                        return $rowLoop->iteration;
                    })
                    ->sortable(),

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
                SelectFilter::make('livestock_id')
                    ->label('Livestock')
                    ->relationship('livestock', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('current_heat_type_id')
                    ->label('Heat Type')
                    ->relationship('currentHeatType', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('insemination_service_id')
                    ->label('Insemination Service')
                    ->relationship('inseminationService', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('insemination_semen_straw_type_id')
                    ->label('Semen Straw Type')
                    ->relationship('semenStrawType', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('created_by')
                    ->label('Created By')
                    ->relationship('createdBy', 'username')
                    ->searchable()
                    ->preload(),

                Filter::make('last_heat_date')
                    ->form([
                        DatePicker::make('heat_from')
                            ->label('Heat From'),
                        DatePicker::make('heat_until')
                            ->label('Heat Until'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['heat_from'],
                                fn ($query, $date) => $query->whereDate('last_heat_date', '>=', $date),
                            )
                            ->when(
                                $data['heat_until'],
                                fn ($query, $date) => $query->whereDate('last_heat_date', '<=', $date),
                            );
                    })
                    ->label('Last Heat Date Range'),

                Filter::make('insemination_date')
                    ->form([
                        DatePicker::make('insemination_from')
                            ->label('Insemination From'),
                        DatePicker::make('insemination_until')
                            ->label('Insemination Until'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['insemination_from'],
                                fn ($query, $date) => $query->whereDate('insemination_date', '>=', $date),
                            )
                            ->when(
                                $data['insemination_until'],
                                fn ($query, $date) => $query->whereDate('insemination_date', '<=', $date),
                            );
                    })
                    ->label('Insemination Date Range'),

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
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                        ->label('View Details'),
                    EditAction::make()
                        ->label('Edit'),
                    DeleteAction::make()
                        ->label('Delete')
                        ->requiresConfirmation()
                        ->modalHeading('Delete Insemination Record')
                        ->modalDescription('Are you sure you want to delete this insemination record? This action cannot be undone.')
                        ->modalSubmitActionLabel('Yes, delete it'),
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
