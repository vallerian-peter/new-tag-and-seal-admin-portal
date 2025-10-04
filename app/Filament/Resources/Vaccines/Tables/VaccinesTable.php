<?php

namespace App\Filament\Resources\Vaccines\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VaccinesTable
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
                    ->searchable(),
                TextColumn::make('lot')
                    ->searchable(),
                TextColumn::make('formulation_type')
                    ->badge()
                    ->color(fn ($record) => match (strtolower($record->formulation_type ?? '')) {
                        'live-attenuated' => 'info',
                        'inactivated' => 'danger',
                        'subunit' => 'warning',
                        default => 'secondary',
                    }),
                TextColumn::make('dose')
                    ->searchable(),
                TextColumn::make('createdBy.username')
                    ->label('Created By')
                    ->sortable(),
                TextColumn::make('updatedBy.username')
                    ->label('Updated By')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('vaccineStatus.name')
                    ->label('Status')
                    ->badge()
                    ->color(fn ($record) => match (strtolower($record->vaccineStatus?->name ?? '')) {
                        'active' => 'success',
                        'inactive' => 'warning',
                        'expired' => 'danger',
                        default => 'secondary',
                    })
                    ->sortable(),
                TextColumn::make('vaccineType.name')
                    ->label('Type')
                    ->sortable(),
                TextColumn::make('vaccineSchedule.name')
                    ->label('Schedule')
                    ->sortable(),
                TextColumn::make('farm.name')
                    ->label('Farm')
                    ->sortable(),
            ])
            ->filters([
                //
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
