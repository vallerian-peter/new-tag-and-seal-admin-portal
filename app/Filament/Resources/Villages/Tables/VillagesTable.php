<?php

namespace App\Filament\Resources\Villages\Tables;

use App\Models\Village;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Filters\SelectFilter;

class VillagesTable
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
                    ->label('Village Name')
                    ->searchable()
                    ->sortable(),

                // TextColumn::make('code')
                //     ->label('Code')
                //     ->searchable()
                //     ->sortable(),

                TextColumn::make('ward.name')
                    ->label('Ward')
                    ->getStateUsing(function ($record) {
                        return $record->ward ? $record->ward->name : 'N/A';
                    })
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
                SelectFilter::make('ward_id')
                    ->label('Ward')
                    ->relationship('ward', 'name')
                    ->preload(),

                // SelectFilter::make('district_id')
                //     ->label('District')
                //     ->relationship('district', 'name')
                //     ->preload(),
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
                return $query->with(['ward']);
            });
    }
}
