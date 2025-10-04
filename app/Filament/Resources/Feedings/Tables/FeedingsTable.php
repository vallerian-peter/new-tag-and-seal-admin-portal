<?php

namespace App\Filament\Resources\Feedings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class FeedingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(function () {
                return \App\Models\Feeding::query()
                    ->with(['farm', 'livestock', 'feedingType', 'state']);
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

                TextColumn::make('livestock.owners')
                    ->label('Owner Name')
                    ->getStateUsing(function ($record) {
                        if ($record->livestock) {
                            $owners = $record->livestock->farmLivestocks()
                                ->with('farm.farmOwners.farmer')
                                ->get()
                                ->flatMap(function ($farmLivestock) {
                                    return $farmLivestock->farm->farmOwners->map(function ($farmOwner) {
                                        return $farmOwner->farmer ?
                                            $farmOwner->farmer->first_name . ' ' . $farmOwner->farmer->surname :
                                            'Unknown';
                                    });
                                })
                                ->unique()
                                ->values();

                            return $owners->isNotEmpty() ? $owners->join(', ') : 'N/A';
                        }
                        return 'N/A';
                    })
                    ->sortable(),

                TextColumn::make('feedingType.name')
                    ->label('Feeding Type')
                    ->getStateUsing(function ($record) {
                        return $record->feedingType ? $record->feedingType->name : 'N/A';
                    })
                    ->sortable(),

                TextColumn::make('amount')
                    ->label('Amount')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('feeding_time')
                    ->label('Feeding Time')
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

                SelectFilter::make('feeding_type_id')
                    ->label('Feeding Type')
                    ->relationship('feedingType', 'name')
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
