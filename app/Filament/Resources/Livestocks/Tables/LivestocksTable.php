<?php

namespace App\Filament\Resources\Livestocks\Tables;

use App\Models\Livestock;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LivestocksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(function () {
                return Livestock::query()
                    ->with(['livestockType', 'breed', 'species', 'livestockStatus', 'gender', 'livestockObtainedMethod', 'farms']);
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

                TextColumn::make('farms.name')
                    ->label('Farm Name')
                    ->getStateUsing(function ($record) {
                        $farm = $record->farms->first();
                        return $farm ? $farm->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('owner_name')
                    ->label('Owner')
                    ->getStateUsing(function ($record) {
                        // Get owner through farm relationship
                        $farm = $record->farms->first();
                        if ($farm && $farm->farmers->isNotEmpty()) {
                            $farmer = $farm->farmers->first();
                            return $farmer->first_name . ' ' . $farmer->last_name;
                        }
                        return 'N/A';
                    })
                    ->searchable(false)
                    ->sortable(false),

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

                SelectFilter::make('farms')
                    ->label('Farm')
                    ->relationship('farms', 'name')
                    ->searchable()
                    ->preload(),

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
