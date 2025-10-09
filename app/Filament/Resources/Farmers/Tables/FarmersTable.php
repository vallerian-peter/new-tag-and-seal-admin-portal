<?php

namespace App\Filament\Resources\Farmers\Tables;

use App\Models\Farmer;
use App\Models\Gender;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ActionGroup;
use Filament\Tables\Filters\Filter;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Select;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class FarmersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(function () {
                $query = Farmer::query();

                // Eager load relationships to avoid N+1 queries
                $query->with([
                    'gender',
                    'farmerType',
                    'status',
                    'village',
                    'ward',
                    'division',
                    'district',
                    'region',
                    'country',
                    'farmOwners' // For farm count
                ]);

                return $query;
            })
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->getStateUsing(function ($record, $rowLoop) {
                        return $rowLoop->iteration;
                    })
                    ->sortable(false),

                TextColumn::make('farmer_no')
                    ->label('Farmer No')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('full_name')
                    ->label('Full Name')
                    ->getStateUsing(function (Farmer $record) {
                        $fullname = trim(
                            ($record->first_name ?? '') . ' ' .
                            ($record->middle_name ?? '') . ' ' .
                            ($record->surname ?? '')
                        );
                        return $fullname ?: 'N/A';
                    })
                    ->searchable(query: function ($query, string $search) {
                        return $query->where(function ($query) use ($search) {
                            $query->where('first_name', 'like', "%{$search}%")
                                ->orWhere('middle_name', 'like', "%{$search}%")
                                ->orWhere('surname', 'like', "%{$search}%");
                        });
                    }),

                TextColumn::make('phone_1')
                    ->label('Phone')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('gender.name')
                    ->label('Gender')
                    ->badge()
                    ->color(function ($record) {
                        if (!$record->gender) {
                            return 'secondary';
                        }

                        return strtolower(Gender::getColorStatic($record->gender->name));
                    })
                    ->getStateUsing(function ($record) {
                        return $record->gender ? $record->gender->name : 'N/A';
                    })
                    ->sortable(),

                TextColumn::make('farmerType.name')
                    ->label('Farmer Type')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('farm_count')
                    ->label('Farms')
                    ->getStateUsing(function (Farmer $record) {
                        return $record->farm_count;
                    })
                    ->badge()
                    ->color('success')
                    ->sortable(),

                TextColumn::make('village.name')
                    ->label('Village')
                    ->getStateUsing(function ($record) {
                        return $record->village ? $record->village->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('ward.name')
                    ->label('Ward')
                    ->getStateUsing(function ($record) {
                        return $record->ward ? $record->ward->name : 'N/A';
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

                TextColumn::make('division.name')
                    ->label('Division')
                    ->getStateUsing(function ($record) {
                        return $record->division ? $record->division->name : 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('identity_number')
                    ->label('Identity Number')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('is_verified')
                    ->label('Verified')
                    ->formatStateUsing(fn ($state) => $state ? '1' : '0')
                    ->badge()
                    ->color(fn ($state) => $state ? 'success' : 'warning')
                    ->sortable(),

                TextColumn::make('status.name')
                    ->label('Status')
                    ->badge()
                    ->color(function ($record) {
                        if (!$record->status) {
                            return 'secondary';
                        }

                        switch (strtolower($record->status->name)) {
                            case 'active':
                                return 'success';
                            case 'inactive':
                                return 'danger';
                            case 'pending':
                                return 'warning';
                            default:
                                return 'secondary';
                        }
                    })
                    ->sortable(),


                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Filter::make('farmer_type_id')
                    ->form([
                        Select::make('farmer_type_id')
                            ->relationship('farmerType', 'name')
                            ->searchable()
                            ->preload()
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['farmer_type_id'],
                                fn ($query, $farmerTypeId) => $query->where('farmer_type_id', $farmerTypeId)
                            );
                    }),

                Filter::make('farmer_status_id')
                    ->form([
                        Select::make('farmer_status_id')
                            ->relationship('status', 'name')
                            ->searchable()
                            ->preload()
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['farmer_status_id'],
                                fn ($query, $statusId) => $query->where('farmer_status_id', $statusId)
                            );
                    }),

                Filter::make('is_verified')
                    ->form([
                        Select::make('is_verified')
                            ->options([
                                1 => 'Verified',
                                0 => 'Not Verified',
                            ])
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                isset($data['is_verified']),
                                fn ($query, $isVerified) => $query->where('is_verified', $data['is_verified'])
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
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated([10, 25, 50, 100]);
    }
}
