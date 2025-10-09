<?php

namespace App\Filament\Resources\Calvings\Tables;

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

class CalvingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(function () {
                return \App\Models\Calving::query()
                    ->with(['farm', 'livestock', 'calvingType', 'calvingProblem', 'reproductiveProblem', 'state']);
            })
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->getStateUsing(function ($record, $rowLoop) {
                        return $rowLoop->iteration;
                    })
                    ->sortable(),

                TextColumn::make('reference_no')
                    ->label('Reference No')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),

                TextColumn::make('livestock.name')
                    ->label('Livestock Name')
                    ->getStateUsing(function ($record) {
                        return $record->livestock ? $record->livestock->name : 'N/A';
                    })
                    ->sortable(),

                TextColumn::make('farm.name')
                    ->label('Farm Name')
                    ->getStateUsing(function ($record) {
                        return $record->farm ? $record->farm->name : 'N/A';
                    })
                    ->sortable(),

                TextColumn::make('calvingType.name')
                    ->label('Calving Type')
                    ->getStateUsing(function ($record) {
                        return $record->calvingType ? $record->calvingType->name : 'N/A';
                    })
                    ->badge()
                    ->color('success')
                    ->sortable(),

                TextColumn::make('calvingProblem.name')
                    ->label('Calving Problem')
                    ->getStateUsing(function ($record) {
                        return $record->calvingProblem ? $record->calvingProblem->name : 'N/A';
                    })
                    ->badge()
                    ->color('warning')
                    ->sortable(),

                TextColumn::make('reproductiveProblem.name')
                    ->label('Reproductive Problem')
                    ->getStateUsing(function ($record) {
                        return $record->reproductiveProblem ? $record->reproductiveProblem->name : 'N/A';
                    })
                    ->badge()
                    ->color('danger')
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

                SelectFilter::make('livestock_id')
                    ->label('Livestock')
                    ->relationship('livestock', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('calving_type_id')
                    ->label('Calving Type')
                    ->relationship('calvingType', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('calving_problem_type_id')
                    ->label('Calving Problem')
                    ->relationship('calvingProblem', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('calf_reproductive_problem_type_id')
                    ->label('Reproductive Problem')
                    ->relationship('reproductiveProblem', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('created_by')
                    ->label('Created By')
                    ->relationship('createdBy', 'username')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('state_id')
                    ->label('State')
                    ->relationship('state', 'name')
                    ->searchable()
                    ->preload(),

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
                        ->requiresConfirmation(),
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
