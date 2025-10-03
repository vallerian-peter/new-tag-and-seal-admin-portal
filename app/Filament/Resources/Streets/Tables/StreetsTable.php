<?php

namespace App\Filament\Resources\Streets\Tables;

use App\Models\Street;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class StreetsTable
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
                    ->label('Street Name')
                    ->searchable()
                    ->sortable(),


                TextColumn::make('ward.name')
                    ->label('Ward')
                    ->getStateUsing(function ($record) {
                        return $record->ward ? $record->ward->name : 'N/A';
                    })
                    ->badge()
                    ->color('secondary')
                    ->sortable(),


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
                SelectFilter::make('ward_id')
                    ->label('Ward')
                    ->relationship('ward', 'name')
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
                return $query->with(['village', 'ward']);
            });
    }
}
