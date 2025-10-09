<?php

namespace App\Filament\Resources\Pregnancies\Tables;

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

class PregnanciesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(function () {
                return \App\Models\Pregnancy::query()
                    ->with(['farm', 'livestock', 'testResult', 'state']);
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

                TextColumn::make('serial')
                    ->label('Serial')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('testResult.name')
                    ->label('Test Result')
                    ->getStateUsing(function ($record) {
                        return $record->testResult ? $record->testResult->name : 'N/A';
                    })
                    ->badge()
                    ->color(fn ($record) => match (strtolower($record->testResult?->name ?? '')) {
                        'positive' => 'success',
                        'negative' => 'danger',
                        'inconclusive' => 'warning',
                        default => 'secondary',
                    })
                    ->sortable(),

                TextColumn::make('no_of_months')
                    ->label('Months')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                TextColumn::make('test_date')
                    ->label('Test Date')
                    ->dateTime()
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

                SelectFilter::make('test_result_id')
                    ->label('Test Result')
                    ->relationship('testResult', 'name')
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

                Filter::make('test_date')
                    ->form([
                        DatePicker::make('test_from')
                            ->label('Test Date From'),
                        DatePicker::make('test_until')
                            ->label('Test Date Until'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['test_from'],
                                fn ($query, $date) => $query->whereDate('test_date', '>=', $date),
                            )
                            ->when(
                                $data['test_until'],
                                fn ($query, $date) => $query->whereDate('test_date', '<=', $date),
                            );
                    })
                    ->label('Test Date Range'),

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
