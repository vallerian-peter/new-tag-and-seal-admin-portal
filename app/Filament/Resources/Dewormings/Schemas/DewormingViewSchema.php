<?php

namespace App\Filament\Resources\Dewormings\Schemas;

use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class DewormingViewSchema
{
    public static function configure(Schema $schema, $record): Schema
    {
        return $schema
            ->record($record)
            ->components([
                Grid::make(1) // All sections stack full-width
                    ->columnSpanFull()
                    ->components([
                        Section::make('Deworming Information')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Reference Number')
                                        ->components([
                                            Text::make(fn ($record) => $record->reference_no)
                                                ->color('primary')
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Farm')
                                        ->components([
                                            Text::make(fn ($record) => $record->farm?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Livestock')
                                        ->components([
                                            Text::make(fn ($record) => $record->livestock?->identification_number ?: 'Not specified')
                                                ->color('info'),
                                        ]),

                                    Fieldset::make('Medicine')
                                        ->components([
                                            Text::make(fn ($record) => $record->medicine?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Quantity')
                                        ->components([
                                            Text::make(fn ($record) => $record->quantity . ' ' . ($record->quantityUnit?->name ?? '')),
                                        ]),

                                    Fieldset::make('Dose')
                                        ->components([
                                            Text::make(fn ($record) => $record->dose ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Administration Route')
                                        ->components([
                                            Text::make(fn ($record) => $record->administration_route ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Next Administration Date')
                                        ->components([
                                            Text::make(fn ($record) => $record->next_administration_date ? $record->next_administration_date->format('M d, Y') : 'Not specified'),
                                        ]),
                                ]),
                            ]),

                        Section::make('Personnel Information')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Veterinarian')
                                        ->components([
                                            Text::make(fn ($record) => $record->vet?->username ?: 'Not assigned'),
                                        ]),

                                    Fieldset::make('Extension Officer')
                                        ->components([
                                            Text::make(fn ($record) => $record->extensionOfficer?->username ?: 'Not assigned'),
                                        ]),
                                ]),
                            ]),

                        Section::make('Additional Information')
                            ->components([
                                Grid::make(1)->components([
                                    Fieldset::make('Remarks')
                                        ->components([
                                            Text::make(fn ($record) => $record->remarks ?: 'No remarks'),
                                        ]),

                                    Fieldset::make('State')
                                        ->components([
                                            Text::make(fn ($record) => $record->state?->name ?: 'Not specified')
                                                ->color('info'),
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
                                                    'conflict' => 'danger',
                                                    'deleted' => 'gray',
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
