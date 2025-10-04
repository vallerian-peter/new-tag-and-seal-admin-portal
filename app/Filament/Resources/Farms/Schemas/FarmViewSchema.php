<?php

namespace App\Filament\Resources\Farms\Schemas;

use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Icon;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class FarmViewSchema
{
    public static function configure(Schema $schema, $record): Schema
    {
        return $schema
            ->record($record)
            ->components([

                Grid::make(1) // All sections stack full-width
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
                                            Text::make(fn ($record) => $record->regional_reg_no ?: 'Not provided'),
                                        ]),

                                    Fieldset::make('Farm Name')
                                        ->components([
                                            Text::make(fn ($record) => $record->name)
                                                ->weight('bold')
                                                ->size('lg'),
                                        ]),

                                    Fieldset::make('Farm Size')
                                        ->components([
                                            Text::make(fn ($record) => $record->size . ' ' . ($record->sizeUnit?->name ?? 'units')),
                                        ]),

                                    Fieldset::make('Size Unit')
                                        ->components([
                                            Text::make(fn ($record) => $record->sizeUnit?->name ?: 'Not specified')
                                                ->color('info'),
                                        ]),
                                ]),
                            ]),

                        Section::make('Location Information')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Latitude')
                                        ->components([
                                            Text::make(fn ($record) => $record->latitudes ?: 'Not provided'),
                                        ]),

                                    Fieldset::make('Longitude')
                                        ->components([
                                            Text::make(fn ($record) => $record->longitudes ?: 'Not provided'),
                                        ]),

                                    Fieldset::make('GPS Coordinates')
                                        ->components([
                                            Icon::make(fn ($record) => $record->has_coordinates ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
                                                ->color(fn ($record) => $record->has_coordinates ? 'success' : 'danger'),
                                        ]),

                                    Fieldset::make('Physical Address')
                                        ->components([
                                            Text::make(fn ($record) => $record->physical_address ?: 'Not provided'),
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

                                    Fieldset::make('Division')
                                        ->components([
                                            Text::make(fn ($record) => $record->division?->name ?: 'Not specified'),
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
                                ]),
                            ]),

                        Section::make('Farm Details')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Legal Status')
                                        ->components([
                                            Text::make(fn ($record) => $record->legalStatus?->name ?: 'Not specified')
                                                ->color('warning')
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Farm Status')
                                        ->components([
                                            Text::make(fn ($record) => $record->farmStatus?->name ?: 'Not specified')
                                                ->color(fn ($record) => match (strtolower($record->farmStatus?->name ?? '')) {
                                                    'active' => 'success',
                                                    'inactive' => 'danger',
                                                    'pending' => 'warning',
                                                    default => 'secondary',
                                                })
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('GPS Information')
                                        ->components([
                                            Text::make(fn ($record) => $record->gps ?: 'Not provided'),
                                        ]),
                                ]),
                            ]),

                        Section::make('Ownership Information')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Farm Owners')
                                        ->components([
                                            Text::make(fn ($record) => $record->owner_full_name ?: 'No owners assigned')
                                                ->color('success')
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Owner Details')
                                        ->components([
                                            Text::make(function ($record) {
                                                $owners = $record->farmOwners()->with('farmer')->get();
                                                if ($owners->isEmpty()) {
                                                    return 'No owners assigned';
                                                }

                                                $details = $owners->map(function ($farmOwner) {
                                                    if ($farmOwner->farmer) {
                                                        $farmer = $farmOwner->farmer;
                                                        return "{$farmer->first_name} {$farmer->surname} ({$farmer->farmer_no})";
                                                    }
                                                    return 'Unknown Owner';
                                                });

                                                return $details->join(', ');
                                            }),
                                        ]),
                                ]),
                            ]),

                                Section::make('System Information')
                                    ->components([
                                        Grid::make(2)->components([
                                            Fieldset::make('UUID')
                                                ->components([
                                                    Text::make(fn ($record) => $record->uuid ?: 'Not generated')
                                                        ->color('info')
                                                        ->size('sm'),
                                                ]),

                                            Fieldset::make('Created At')
                                                ->components([
                                                    Text::make(fn ($record) => $record->created_at?->format('M d, Y H:i') . ' (' . $record->created_at?->diffForHumans() . ')'),
                                                ]),

                                            Fieldset::make('Last Updated')
                                                ->components([
                                                    Text::make(fn ($record) => $record->updated_at?->format('M d, Y H:i') . ' (' . $record->updated_at?->diffForHumans() . ')'),
                                                ]),

                                            Fieldset::make('Created By')
                                                ->components([
                                                    Text::make(fn ($record) => $record->createdBy?->username ?: 'Unknown'),
                                                ]),

                                            Fieldset::make('Updated By')
                                                ->components([
                                                    Text::make(fn ($record) => $record->updatedBy?->username ?: 'Unknown'),
                                                ]),
                                        ]),
                                    ])
                                    ->collapsible(),
                    ]),
            ]);
    }
}
