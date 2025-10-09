<?php

namespace App\Filament\Resources\Vaccines\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;

class VaccinesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function ($query) {
                return $query->with(['vaccineStatus', 'vaccineType', 'vaccineSchedule', 'farm', 'diseases', 'vaccineDiseases.disease', 'createdBy', 'updatedBy']);
            })
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
                TextColumn::make('farm_assignment')
                    ->label('Farm Assignment')
                    ->getStateUsing(function ($record) {
                        if (!$record->farm) {
                            return 'No Farm Assigned';
                        }
                        return $record->farm->name . ' →';
                    })
                    ->badge()
                    ->color(fn ($record) => $record->farm ? 'info' : 'secondary')
                    ->sortable()
                    ->tooltip(fn ($record) => $record->farm ?
                        'Click "View Details" to see farm information' :
                        'No farm assigned to this vaccine'),

                TextColumn::make('diseases_count')
                    ->label('Diseases Treated')
                    ->getStateUsing(function ($record) {
                        $count = $record->diseases->count();
                        if ($count === 0) {
                            return 'No Diseases';
                        }
                        return "{$count} Disease" . ($count > 1 ? 's' : '') . ' →';
                    })
                    ->badge()
                    ->color(fn ($record) => $record->diseases->count() > 0 ? 'warning' : 'secondary')
                    ->searchable(query: function ($query, string $search) {
                        return $query->whereHas('diseases', function ($query) use ($search) {
                            $query->where('name', 'like', "%{$search}%");
                        });
                    })
                    ->tooltip(fn ($record) => $record->diseases->count() > 0 ?
                        'Click "View Details" to see all diseases' :
                        'No diseases assigned to this vaccine'),
            ])
            ->filters([
                SelectFilter::make('vaccine_status_id')
                    ->label('Vaccine Status')
                    ->relationship('vaccineStatus', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('vaccine_type_id')
                    ->label('Vaccine Type')
                    ->relationship('vaccineType', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('vaccine_schedule_id')
                    ->label('Vaccine Schedule')
                    ->relationship('vaccineSchedule', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('farm_id')
                    ->label('Assigned Farm')
                    ->relationship('farm', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('formulation_type')
                    ->label('Formulation Type')
                    ->options([
                        'live-attenuated' => 'Live Attenuated',
                        'inactivated' => 'Inactivated',
                        'subunit' => 'Subunit',
                        'toxoid' => 'Toxoid',
                        'conjugate' => 'Conjugate',
                    ]),

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
                    }),
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
