<?php

namespace App\Filament\Resources\Vaccinations\Tables;

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

class VaccinationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->with([
                'livestock',
                'vaccine',
                'disease',
                'vet',
                'extensionOfficer',
                'createdBy',
                'updatedBy',
                'vaccinationStatus'
            ]))
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->getStateUsing(function ($record, $rowLoop) {
                        return $rowLoop->iteration;
                    })
                    ->sortable(),

                TextColumn::make('vaccination_no')
                    ->label('Vaccination No')
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

                TextColumn::make('vaccine.name')
                    ->label('Vaccine')
                    ->searchable()
                    ->sortable()
                    ->placeholder('--'),

                TextColumn::make('disease.name')
                    ->label('Disease')
                    ->searchable()
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

                TextColumn::make('vaccinationStatus.name')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Completed' => 'success',
                        'Pending' => 'warning',
                        'Failed' => 'danger',
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

                SelectFilter::make('vaccine_id')
                    ->label('Vaccine')
                    ->relationship('vaccine', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('disease_id')
                    ->label('Disease')
                    ->relationship('disease', 'name')
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

                SelectFilter::make('vaccination_status_id')
                    ->label('Status')
                    ->relationship('vaccinationStatus', 'name')
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
                        ->requiresConfirmation()
                        ->modalHeading('Delete Vaccination Record')
                        ->modalDescription('Are you sure you want to delete this vaccination record? This action cannot be undone.')
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
