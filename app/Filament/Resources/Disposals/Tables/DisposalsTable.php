<?php

namespace App\Filament\Resources\Disposals\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Table;

class DisposalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(function () {
                return \App\Models\Disposal::query()
                    ->with(['farm', 'livestock', 'disposalType', 'vet', 'extensionOfficer', 'state']);
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

                TextColumn::make('disposalType.name')
                    ->label('Disposal Type')
                    ->getStateUsing(function ($record) {
                        return $record->disposalType ? $record->disposalType->name : 'N/A';
                    })
                    ->badge()
                    ->color('warning')
                    ->sortable(),

                TextColumn::make('reasons')
                    ->label('Reasons')
                    ->searchable()
                    ->limit(30)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 30) {
                            return null;
                        }
                        return $state;
                    }),

                ToggleColumn::make('meat_obtaines')
                    ->label('Meat Obtained')
                    ->sortable(),

                TextColumn::make('vet.full_name')
                    ->label('Vet')
                    ->getStateUsing(function ($record) {
                        return $record->vet ? $record->vet->full_name : 'N/A';
                    })
                    ->searchable(query: function ($query, string $search) {
                        return $query->whereHas('vet', function ($query) use ($search) {
                            $query->where('username', 'like', "%{$search}%");
                        });
                    })
                    ->sortable(),

                TextColumn::make('extensionOfficer.full_name')
                    ->label('Extension Officer')
                    ->getStateUsing(function ($record) {
                        return $record->extensionOfficer ? $record->extensionOfficer->full_name : 'N/A';
                    })
                    ->searchable(query: function ($query, string $search) {
                        return $query->whereHas('extensionOfficer', function ($query) use ($search) {
                            $query->where('username', 'like', "%{$search}%");
                        });
                    })
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

                SelectFilter::make('animal_disposal_type_id')
                    ->label('Disposal Type')
                    ->relationship('disposalType', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('vet_id')
                    ->label('Veterinarian')
                    ->relationship('vet', 'username')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('extension_officer_id')
                    ->label('Extension Officer')
                    ->relationship('extensionOfficer', 'username')
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

                TernaryFilter::make('meat_obtaines')
                    ->label('Meat Obtained')
                    ->placeholder('All records')
                    ->trueLabel('Meat obtained')
                    ->falseLabel('No meat obtained'),

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
