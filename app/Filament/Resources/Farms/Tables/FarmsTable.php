<?php

namespace App\Filament\Resources\Farms\Tables;

use App\Models\Farm;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

class FarmsTable
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
                    ->label('Reference No')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Farm Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('size')
                    ->label('Size')
                    ->sortable(),

                TextColumn::make('sizeUnit.name')
                    ->label('Size Unit')
                    ->getStateUsing(function ($record) {
                        return $record->sizeUnit ? $record->sizeUnit->name : 'N/A';
                    })
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('owner_full_name')
                    ->label('Owner(s)')
                    ->getStateUsing(function (Farm $record) {
                        return $record->owner_full_name;
                    }),

                TextColumn::make('village.name')
                    ->label('Village')
                    ->getStateUsing(function ($record) {
                        return $record->village ? $record->village->name : 'N/A';
                    })
                    ->sortable(),

                TextColumn::make('ward.name')
                    ->label('Ward')
                    ->getStateUsing(function ($record) {
                        return $record->ward ? $record->ward->name : 'N/A';
                    })
                    ->sortable(),

                TextColumn::make('district.name')
                    ->label('District')
                    ->getStateUsing(function ($record) {
                        return $record->district ? $record->district->name : 'N/A';
                    })
                    ->sortable(),

                TextColumn::make('region.name')
                    ->label('Region')
                    ->getStateUsing(function ($record) {
                        return $record->region ? $record->region->name : 'N/A';
                    })
                    ->sortable(),

                TextColumn::make('country.name')
                    ->label('Country')
                    ->getStateUsing(function ($record) {
                        return $record->country ? $record->country->name : 'N/A';
                    })
                    ->sortable(),

                TextColumn::make('street.name')
                    ->label('Street')
                    ->getStateUsing(function ($record) {
                        return $record->street ? $record->street->name : 'N/A';
                    })
                    ->sortable(),

                TextColumn::make('farmStatus.name')
                    ->label('Status')
                    ->badge()
                    ->color(function ($record) {
                        if (!$record->farmStatus) {
                            return 'secondary';
                        }
                        return match (strtolower($record->farmStatus->name)) {
                            'active' => 'success',
                            'inactive' => 'danger',
                            'pending' => 'warning',
                            default => 'secondary',
                        };
                    })
                    ->sortable(),

                TextColumn::make('has_coordinates')
                    ->label('GPS')
                    ->formatStateUsing(fn ($state) => $state ? 'Yes' : 'No')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->date()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('farm_status_id')
                    ->label('Farm Status')
                    ->relationship('farmStatus', 'name')
                    ->preload(),

                SelectFilter::make('region_id')
                    ->label('Region')
                    ->relationship('region', 'name')
                    ->preload(),

                SelectFilter::make('district_id')
                    ->label('District')
                    ->relationship('district', 'name')
                    ->preload(),

                TernaryFilter::make('has_coordinates')
                    ->label('Has GPS Coordinates')
                    ->placeholder('All farms')
                    ->trueLabel('With GPS')
                    ->falseLabel('Without GPS'),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->modifyQueryUsing(function ($query) {
                return $query->with([
                    'sizeUnit',
                    'farmOwners.farmer',
                    'village',
                    'ward',
                    'district',
                    'region',
                    'country',
                    'street',
                    'farmStatus'
                ]);
            });
    }
}
