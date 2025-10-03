<?php

namespace App\Filament\Resources\Vets\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class VetsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(function () {
                return \App\Models\Vet::query()
                    ->with(['gender', 'identityCardType', 'schoolLevel', 'country', 'region', 'district', 'status']);
            })
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->getStateUsing(function ($record, $rowLoop) {
                        return $rowLoop->iteration;
                    })
                    ->sortable(),

                TextColumn::make('registration_no')
                    ->label('Registration No')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),

                TextColumn::make('name')
                    ->label('Veterinarian Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone_1')
                    ->label('Primary Phone')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('medical_licence_no')
                    ->label('Medical Licence')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('gender.name')
                    ->label('Gender')
                    ->getStateUsing(function ($record) {
                        return $record->gender ? $record->gender->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('district.name')
                    ->label('District')
                    ->getStateUsing(function ($record) {
                        return $record->district ? $record->district->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('is_verified')
                    ->label('Verified')
                    ->badge()
                    ->color(fn (bool $state): string => $state ? 'success' : 'warning')
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Yes' : 'No'),

                TextColumn::make('status.name')
                    ->label('Status')
                    ->getStateUsing(function ($record) {
                        return $record->status ? $record->status->name : 'N/A';
                    })
                    ->badge()
                    ->color(fn ($record) => $record->status ? $record->status->color : 'gray')
                    ->searchable()
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
                SelectFilter::make('gender_id')
                    ->label('Gender')
                    ->relationship('gender', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('district_id')
                    ->label('District')
                    ->relationship('district', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('status_id')
                    ->label('Status')
                    ->relationship('status', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('is_verified')
                    ->label('Verification Status')
                    ->options([
                        1 => 'Verified',
                        0 => 'Not Verified',
                    ]),
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
