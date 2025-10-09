<?php

namespace App\Filament\Resources\Dewormings\Tables;

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

class DewormingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->with([
                'livestock',
                'medicine',
                'quantityUnit',
                'vet',
                'extensionOfficer',
                'state',
                'createdBy',
                'updatedBy',
                'farm'
            ]))
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
                    ->sortable(),

                TextColumn::make('livestock.name')
                    ->label('Livestock')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function ($record) {
                        if (!$record->livestock) return '--';
                        return $record->livestock->name . ' (' . $record->livestock->identification_number . ')';
                    })
                    ->placeholder('--'),

                TextColumn::make('farm.name')
                    ->label('Farm')
                    ->searchable()
                    ->sortable()
                    ->placeholder('--'),

                TextColumn::make('medicine.name')
                    ->label('Medicine')
                    ->searchable()
                    ->sortable()
                    ->placeholder('--'),

                TextColumn::make('quantity')
                    ->label('Quantity')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function ($state, $record) {
                        return $state . ' ' . ($record->quantityUnit?->name ?? '');
                    }),

                TextColumn::make('dose')
                    ->label('Dose')
                    ->searchable()
                    ->sortable()
                    ->placeholder('--'),

                TextColumn::make('administration_route')
                    ->label('Route')
                    ->searchable()
                    ->sortable()
                    ->placeholder('--'),

                TextColumn::make('next_administration_date')
                    ->label('Next Date')
                    ->date()
                    ->sortable()
                    ->placeholder('--'),

                TextColumn::make('vet.full_name')
                    ->label('Vet')
                    ->getStateUsing(function ($record) {
                        return $record->vet ? $record->vet->full_name : '--';
                    })
                    ->searchable(query: function ($query, string $search) {
                        return $query->whereHas('vet', function ($query) use ($search) {
                            $query->where('username', 'like', "%{$search}%");
                        });
                    })
                    ->sortable()
                    ->placeholder('--'),

                TextColumn::make('extensionOfficer.full_name')
                    ->label('Extension Officer')
                    ->getStateUsing(function ($record) {
                        return $record->extensionOfficer ? $record->extensionOfficer->full_name : '--';
                    })
                    ->searchable(query: function ($query, string $search) {
                        return $query->whereHas('extensionOfficer', function ($query) use ($search) {
                            $query->where('username', 'like', "%{$search}%");
                        });
                    })
                    ->sortable()
                    ->placeholder('--'),

                TextColumn::make('createdBy.full_name')
                    ->label('Created By')
                    ->getStateUsing(function ($record) {
                        return $record->createdBy ? $record->createdBy->full_name : '--';
                    })
                    ->searchable(query: function ($query, string $search) {
                        return $query->whereHas('createdBy', function ($query) use ($search) {
                            $query->where('username', 'like', "%{$search}%");
                        });
                    })
                    ->sortable()
                    ->placeholder('--'),

                TextColumn::make('updatedBy.full_name')
                    ->label('Updated By')
                    ->getStateUsing(function ($record) {
                        return $record->updatedBy ? $record->updatedBy->full_name : '--';
                    })
                    ->searchable(query: function ($query, string $search) {
                        return $query->whereHas('updatedBy', function ($query) use ($search) {
                            $query->where('username', 'like', "%{$search}%");
                        });
                    })
                    ->sortable()
                    ->placeholder('--'),

                TextColumn::make('state.name')
                    ->label('State')
                    ->badge()
                    ->color('info')
                    ->sortable()
                    ->placeholder('--'),

                TextColumn::make('sync_status')
                    ->label('Sync Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'synced' => 'success',
                        'pending' => 'warning',
                        'conflict' => 'danger',
                        'deleted' => 'gray',
                        default => 'secondary',
                    })
                    ->sortable()
                    ->placeholder('--'),

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
                SelectFilter::make('livestock_id')
                    ->label('Livestock')
                    ->relationship('livestock', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('farm_id')
                    ->label('Farm')
                    ->relationship('farm', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('medicine_id')
                    ->label('Medicine')
                    ->relationship('medicine', 'name')
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

                SelectFilter::make('state_id')
                    ->label('State')
                    ->relationship('state', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('sync_status')
                    ->label('Sync Status')
                    ->options([
                        'pending' => 'Pending',
                        'synced' => 'Synced',
                        'conflict' => 'Conflict',
                        'deleted' => 'Deleted',
                    ]),

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

                Filter::make('next_administration_date')
                    ->form([
                        DatePicker::make('next_date_from')
                            ->label('Next Date From'),
                        DatePicker::make('next_date_until')
                            ->label('Next Date Until'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['next_date_from'],
                                fn ($query, $date) => $query->whereDate('next_administration_date', '>=', $date),
                            )
                            ->when(
                                $data['next_date_until'],
                                fn ($query, $date) => $query->whereDate('next_administration_date', '<=', $date),
                            );
                    })
                    ->label('Next Administration Date Range'),
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
                        ->modalHeading('Delete Deworming Record')
                        ->modalDescription('Are you sure you want to delete this deworming record? This action cannot be undone.')
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
