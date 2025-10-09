<?php

namespace App\Filament\Resources\Farms\Schemas;

use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class FarmViewSchema
{
    public static function configure(Schema $schema, $record): Schema
    {
        return $schema
            ->record($record)
            ->components([
                Grid::make(1)
                    ->columnSpanFull()
                    ->components([
                        Section::make('Farm Information')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Reference Number')
                                        ->components([
                                            Text::make(fn ($record) => $record->reference_no)
                                                ->color('primary')
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Regional Registration Number')
                                        ->components([
                                            Text::make(fn ($record) => $record->regional_reg_no ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Farm Name')
                                        ->components([
                                            Text::make(fn ($record) => $record->name)
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Farm Size')
                                        ->components([
                                            Text::make(fn ($record) => $record->size . ' ' . ($record->sizeUnit->name ?? '')),
                                        ]),

                                    Fieldset::make('Farm Status')
                                        ->components([
                                            Text::make(fn ($record) => $record->farmStatus?->name ?: 'Not specified')
                                                ->color(fn ($record) => match (strtolower($record->farmStatus?->name ?? '')) {
                                                    'active' => 'success',
                                                    'inactive' => 'danger',
                                                    'pending' => 'warning',
                                                    default => 'secondary',
                                                }),
                                        ]),

                                    Fieldset::make('Legal Status')
                                        ->components([
                                            Text::make(fn ($record) => $record->legalStatus?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Has GPS Coordinates')
                                        ->components([
                                            Text::make(fn ($record) => $record->has_coordinates ? 'Yes' : 'No')
                                                ->color(fn ($record) => $record->has_coordinates ? 'success' : 'gray'),
                                        ]),
                                ]),
                            ]),

                        Section::make('Location Information')
                            ->components([
                                Grid::make(3)->components([
                                    Fieldset::make('Physical Address')
                                        ->columnSpanFull()
                                        ->components([
                                            Text::make(fn ($record) => $record->physical_address),
                                        ]),

                                    Fieldset::make('Street')
                                        ->components([
                                            Text::make(fn ($record) => $record->street?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Village')
                                        ->components([
                                            Text::make(fn ($record) => $record->village?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Ward')
                                        ->components([
                                            Text::make(fn ($record) => $record->ward?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('District')
                                        ->components([
                                            Text::make(fn ($record) => $record->district?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Region')
                                        ->components([
                                            Text::make(fn ($record) => $record->region?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Country')
                                        ->components([
                                            Text::make(fn ($record) => $record->country?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Latitude')
                                        ->components([
                                            Text::make(fn ($record) => $record->latitudes ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Longitude')
                                        ->components([
                                            Text::make(fn ($record) => $record->longitudes ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('GPS Info')
                                        ->components([
                                            Text::make(fn ($record) => $record->gps ?: 'Not specified'),
                                        ]),
                                ]),
                            ]),

                        Section::make('Farm Owners')
                            ->description('Farmers who own this farm')
                            ->components([
                                Grid::make(1)->components([
                                    Fieldset::make('Owners List')
                                        ->components([
                                            Text::make(function ($record) {
                                                $owners = $record->farmOwners()->with('farmer', 'state')->get();
                                                if ($owners->isEmpty()) {
                                                    return 'No owners assigned';
                                                }
                                                return $owners->map(function ($owner) {
                                                    $farmerName = $owner->farmer
                                                        ? trim($owner->farmer->first_name . ' ' . $owner->farmer->middle_name . ' ' . $owner->farmer->surname)
                                                        : 'Unknown';
                                                    $status = $owner->state?->name ?? 'N/A';
                                                    return "• {$farmerName} ({$status}) - Assigned: " . $owner->created_at->format('M d, Y');
                                                })->join("\n");
                                            })
                                            ->html(),
                                        ]),
                                ]),
                            ])
                            ->collapsible(),

                        Section::make('Assigned Users')
                            ->description('Users managing this farm')
                            ->components([
                                Grid::make(1)->components([
                                    Fieldset::make('Users List')
                                        ->components([
                                            Text::make(function ($record) {
                                                $users = $record->users()->with('user', 'state')->get();
                                                if ($users->isEmpty()) {
                                                    return 'No users assigned';
                                                }
                                                return $users->map(function ($farmUser) {
                                                    $username = $farmUser->user?->username ?? 'Unknown';
                                                    $role = $farmUser->role ?: 'No role';
                                                    $status = $farmUser->state?->name ?? 'N/A';
                                                    return "• {$username} - Role: {$role} ({$status}) - Assigned: " . $farmUser->created_at->format('M d, Y');
                                                })->join("\n");
                                            })
                                            ->html(),
                                        ]),
                                ]),
                            ])
                            ->collapsible(),

                        Section::make('Farm Livestock')
                            ->description('Livestock assigned to this farm')
                            ->components([
                                Grid::make(1)->components([
                                    Fieldset::make('Livestock List')
                                        ->components([
                                            Text::make(function ($record) {
                                                $livestock = $record->farmLivestocks()->with('livestock.livestockType', 'state')->get();
                                                if ($livestock->isEmpty()) {
                                                    return 'No livestock assigned';
                                                }
                                                return $livestock->map(function ($farmLivestock) {
                                                    $name = $farmLivestock->livestock?->name ?? 'Unknown';
                                                    $idNumber = $farmLivestock->livestock?->identification_number ?? 'N/A';
                                                    $type = $farmLivestock->livestock?->livestockType?->name ?? 'N/A';
                                                    $status = $farmLivestock->state?->name ?? 'N/A';
                                                    return "• {$name} (ID: {$idNumber}, Type: {$type}) - Status: {$status} - Assigned: " . $farmLivestock->created_at->format('M d, Y');
                                                })->join("\n");
                                            })
                                            ->html(),
                                        ]),
                                ]),
                            ])
                            ->collapsible(),

                        Section::make('System Information')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('UUID')
                                        ->components([
                                            Text::make(fn ($record) => $record->uuid ?: 'Not generated')
                                                ->color('info')
                                                ->size('sm'),
                                        ]),

                                    Fieldset::make('Created By')
                                        ->components([
                                            Text::make(fn ($record) => $record->createdBy?->username ?: 'Unknown'),
                                        ]),

                                    Fieldset::make('Created At')
                                        ->components([
                                            Text::make(fn ($record) => $record->created_at?->format('M d, Y H:i') . ' (' . $record->created_at?->diffForHumans() . ')'),
                                        ]),

                                    Fieldset::make('Updated By')
                                        ->components([
                                            Text::make(fn ($record) => $record->updatedBy?->username ?: 'Unknown'),
                                        ]),

                                    Fieldset::make('Last Updated')
                                        ->components([
                                            Text::make(fn ($record) => $record->updated_at?->format('M d, Y H:i') . ' (' . $record->updated_at?->diffForHumans() . ')'),
                                        ]),
                                ]),
                            ])
                            ->collapsible(),
                    ]),
            ]);
    }
}

