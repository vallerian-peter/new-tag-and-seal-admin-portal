<?php

namespace App\Filament\Resources\Districts\Tables;


use App\Models\District;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\BulkActionGroup;
use Filament\Schemas\Schema;

class DistrictsTable
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

                TextColumn::make('name')
                    ->label('District Name')
                    ->searchable()
                    ->sortable(),

                // TextColumn::make('code')
                //     ->label('Code')
                //     ->searchable()
                //     ->sortable(),

                TextColumn::make('region.name')
                    ->label('Region')
                    ->getStateUsing(function ($record) {
                        return $record->region ? $record->region->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('country.name')
                    ->label('Country')
                    ->getStateUsing(function ($record) {
                        return $record->country ? $record->country->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('region_id')
                    ->label('Region')
                    ->relationship('region', 'name')
                    ->preload(),

                SelectFilter::make('country_id')
                    ->label('Country')
                    ->relationship('country', 'name')
                    ->preload(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('name', 'asc')
            ->modifyQueryUsing(function ($query) {
                return $query->with(['region', 'country']);
            });
    }
}
