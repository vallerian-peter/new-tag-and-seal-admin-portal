<?php

namespace App\Filament\Resources\Livestocks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LivestocksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(function () {
                return \App\Models\Livestock::query()
                    ->with(['livestockType', 'breed', 'species', 'livestockStatus', 'gender', 'livestockObtainedMethod', 'farm', 'owner']);
            })
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->getStateUsing(function ($record, $rowLoop) {
                        return $rowLoop->iteration;
                    })
                    ->sortable(),

                TextColumn::make('identification_number')
                    ->label('ID Number')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),

                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('farm.name')
                    ->label('Farm Name')
                    ->getStateUsing(function ($record) {
                        return $record->farm ? $record->farm->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('owner.first_name')
                    ->label('Owner')
                    ->getStateUsing(function ($record) {
                        if ($record->owner) {
                            return $record->owner->first_name . ' ' . $record->owner->last_name;
                        }
                        return 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('livestockType.name')
                    ->label('Type')
                    ->getStateUsing(function ($record) {
                        return $record->livestockType ? $record->livestockType->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('breed.name')
                    ->label('Breed')
                    ->getStateUsing(function ($record) {
                        return $record->breed ? $record->breed->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('species.name')
                    ->label('Species')
                    ->getStateUsing(function ($record) {
                        return $record->species ? $record->species->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('gender.name')
                    ->label('Gender')
                    ->getStateUsing(function ($record) {
                        return $record->gender ? $record->gender->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('livestockStatus.name')
                    ->label('Status')
                    ->getStateUsing(function ($record) {
                        return $record->livestockStatus ? $record->livestockStatus->name : 'N/A';
                    })
                    ->badge()
                    ->color(fn ($record) => $record->livestockStatus ? $record->livestockStatus->color : 'gray')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('date_of_birth')
                    ->label('Date of Birth')
                    ->date()
                    ->sortable(),

                TextColumn::make('weight_as_on_registration')
                    ->label('Weight')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

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
                SelectFilter::make('livestock_type_id')
                    ->label('Livestock Type')
                    ->relationship('livestockType', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('breed_id')
                    ->label('Breed')
                    ->relationship('breed', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('species_id')
                    ->label('Species')
                    ->relationship('species', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('livestock_status_id')
                    ->label('Status')
                    ->relationship('livestockStatus', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('gender_id')
                    ->label('Gender')
                    ->relationship('gender', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('farm_id')
                    ->label('Farm')
                    ->relationship('farm', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('owner_id')
                    ->label('Owner')
                    ->relationship('owner', 'first_name')
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
