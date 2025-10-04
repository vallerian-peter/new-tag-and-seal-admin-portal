<?php

namespace App\Filament\Resources\Vaccines\Schemas;

use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Icon;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class VaccineViewSchema
{
    public static function configure(Schema $schema, $record): Schema
    {
        return $schema
            ->record($record)
            ->components([
                Grid::make(1) // All sections stack full-width
                    ->columnSpanFull()
                    ->components([
                        Section::make('Vaccine Information')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Name')
                                        ->components([
                                            Text::make(fn ($record) => $record->name)
                                                ->color('primary')
                                                ->weight('bold')
                                                ->size('lg'),
                                        ]),

                                    Fieldset::make('Lot Number')
                                        ->components([
                                            Text::make(fn ($record) => $record->lot)
                                                ->color('info')
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Formulation Type')
                                        ->components([
                                            Text::make(fn ($record) => $record->formulation_type)
                                                ->color(fn ($record) => match (strtolower($record->formulation_type ?? '')) {
                                                    'live-attenuated' => 'info',
                                                    'inactivated' => 'danger',
                                                    'subunit' => 'warning',
                                                    default => 'secondary',
                                                })
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Dose')
                                        ->components([
                                            Text::make(fn ($record) => $record->dose),
                                        ]),

                                    Fieldset::make('Farm')
                                        ->components([
                                            Text::make(fn ($record) => $record->farm?->name ?: 'Not specified'),
                                        ]),
                                ]),
                            ]),

                        Section::make('Vaccine Details')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Vaccine Status')
                                        ->components([
                                            Text::make(fn ($record) => $record->vaccineStatus?->name ?: 'Not specified')
                                                ->color(fn ($record) => match (strtolower($record->vaccineStatus?->name ?? '')) {
                                                    'active' => 'success',
                                                    'inactive' => 'warning',
                                                    'expired' => 'danger',
                                                    default => 'secondary',
                                                })
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Vaccine Type')
                                        ->components([
                                            Text::make(fn ($record) => $record->vaccineType?->name ?: 'Not specified')
                                                ->color('info'),
                                        ]),

                                    Fieldset::make('Vaccine Schedule')
                                        ->components([
                                            Text::make(fn ($record) => $record->vaccineSchedule?->name ?: 'Not specified')
                                                ->color('warning'),
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

                                    Fieldset::make('Sync Status')
                                        ->components([
                                            Text::make(fn ($record) => $record->sync_status ?: 'Not synced')
                                                ->color(fn ($record) => match ($record->sync_status) {
                                                    'synced' => 'success',
                                                    'pending' => 'warning',
                                                    'failed' => 'danger',
                                                    default => 'secondary',
                                                }),
                                        ]),

                                    Fieldset::make('Device ID')
                                        ->components([
                                            Text::make(fn ($record) => $record->device_id ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Last Modified At')
                                        ->components([
                                            Text::make(fn ($record) => $record->last_modified_at ? $record->last_modified_at->format('M d, Y H:i') . ' (' . $record->last_modified_at->diffForHumans() . ')' : 'Not modified'),
                                        ]),

                                    Fieldset::make('Original Created At')
                                        ->components([
                                            Text::make(fn ($record) => $record->original_created_at ? $record->original_created_at->format('M d, Y H:i') . ' (' . $record->original_created_at->diffForHumans() . ')' : 'Not specified'),
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
