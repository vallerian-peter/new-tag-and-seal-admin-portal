<?php

namespace App\Filament\Resources\Users\Tables;

use App\Models\User;
use App\Models\Farmer;
use Filament\Tables\Table;
use App\Enums\UserTypeEnum;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ActionGroup;
use Filament\Tables\Filters\Filter;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Select;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(function () {
                $query = User::query();

                // Only show SystemUser profile types
                // $query->where('profile', 'SystemUser');

                // Eager load the systemUser relationship to avoid N+1 queries
                $query->with('systemUser');
                $query->with('status');
                $query->with('state');

                return $query;
            })
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->getStateUsing(function ($record, $rowLoop) {
                        // Use a simpler approach - just show the iteration number
                        // This will reset on each page but is more reliable
                        return $rowLoop->iteration;
                    })
                    ->sortable(false),
                TextColumn::make('profile')
                    ->label('Profile')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('full_name')
                    ->label('Full Name')
                    ->getStateUsing(function (User $record) {
                        switch ($record->profile) {
                            case 'Farmer':
                                if ($record->farmer) {
                                    $fullname = trim(
                                        ($record->farmer->first_name ?? '') . ' ' .
                                        ($record->farmer->middle_name ?? '') . ' ' .
                                        ($record->farmer->surname ?? '')
                                    );
                                    return $fullname ?: 'N/A';
                                }
                                return 'N/A';

                            case 'SystemUser':
                                if ($record->systemUser) {
                                    $fullname = $record->systemUser->name;
                                    return $fullname ?: 'N/A';
                                }
                                return $record->username;

                            case 'ExtensionOfficer':
                                if ($record->extensionOfficer) {
                                    $fullname = trim(
                                        ($record->extensionOfficer->first_name ?? '') . ' ' .
                                        ($record->extensionOfficer->middle_name ?? '') . ' ' .
                                        ($record->extensionOfficer->surname ?? '')
                                    );
                                    return $fullname ?: 'N/A';
                                }
                                return $record->username;

                            default:
                                return $record->username;
                        }
                    })
                    ->searchable(query: function ($query, string $search) {
                        return $query->where(function ($query) use ($search) {
                            $query->where('username', 'like', "%{$search}%")
                                ->orWhereHas('systemUser', function ($query) use ($search) {
                                    $query->where('name', 'like', "%{$search}%")
                                        ->orWhere('email', 'like', "%{$search}%");
                                })
                                ->orWhereHas('farmer', function ($query) use ($search) {
                                    $query->where('first_name', 'like', "%{$search}%")
                                        ->orWhere('middle_name', 'like', "%{$search}%")
                                        ->orWhere('surname', 'like', "%{$search}%");
                                })
                                ->orWhereHas('extensionOfficer', function ($query) use ($search) {
                                    $query->where('first_name', 'like', "%{$search}%")
                                        ->orWhere('middle_name', 'like', "%{$search}%")
                                        ->orWhere('surname', 'like', "%{$search}%");
                                });
                        });
                    }),
                TextColumn::make('username')
                    ->label('Username')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status.name')
                    ->label('Status')
                    ->badge()
                    ->color(function ($record) {
                        if (!$record->status) {
                            return 'secondary';
                        }

                        return strtolower($record->getColor($record->status->name));
                    })
                    ->sortable(),
                TextColumn::make('state.name')
                    ->label('State')
                    ->badge()
                    ->color(function ($record) {
                        if (!$record->state) {
                            return 'secondary';
                        }

                        return strtolower($record->getColor($record->state->name));
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
            ])
            ->filters([
                // Filter by profile (direct field, not a relationship)
                Filter::make('profile')
                    ->form([
                        Select::make('profile')
                            ->options(UserTypeEnum::class)
                            ->label('Profile Type')
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['profile'],
                                fn ($query, $profile) => $query->where('profile', $profile)
                            );
                    }),

                // Filter by status
                Filter::make('status_id')
                    ->form([
                        Select::make('status_id')
                            ->relationship('status', 'name')
                            ->searchable()
                            ->preload()
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['status_id'],
                                fn ($query, $statusId) => $query->where('status_id', $statusId)
                            );
                    }),

                // Filter by state
                Filter::make('state_id')
                    ->form([
                        Select::make('state_id')
                            ->relationship('state', 'name')
                            ->searchable()
                            ->preload()
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['state_id'],
                                fn ($query, $stateId) => $query->where('state_id', $stateId)
                            );
                    }),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                        ->label('View Details'),
                    EditAction::make()
                        ->label('Edit')
                        ->disabled(fn ($record) => $record->profile != 'SystemUser'),
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
