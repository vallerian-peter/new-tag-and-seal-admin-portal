<?php

namespace App\Filament\Resources\Medications\Schemas;

use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class MedicationViewSchema
{
    public static function configure(Schema $schema, $record): Schema
    {
        return $schema
            ->record($record)
            ->components([
                Grid::make(1) // All sections stack full-width
                    ->columnSpanFull()
                    ->components([
                        Section::make('Medication Information')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Medication Date')
                                        ->components([
                                            Text::make(fn ($record) => $record->medication_date?->format('M d, Y') ?: 'Not provided')
                                                ->color('primary')
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Quantity')
                                        ->components([
                                            Text::make(fn ($record) => $record->quantity . ' ' . ($record->quantityUnit?->name ?? 'units'))
                                                ->color('info'),
                                        ]),

                                    Fieldset::make('Withdrawal Period')
                                        ->components([
                                            Text::make(fn ($record) => $record->withdrawal_period . ' ' . ($record->withdrawalPeriodUnit?->name ?? 'units'))
                                                ->color('warning'),
                                        ]),

                                    Fieldset::make('Medicine')
                                        ->components([
                                            Text::make(fn ($record) => $record->medicine?->name ?: 'Not specified')
                                                ->color('success')
                                                ->weight('bold'),
                                        ]),
                                ]),
                            ]),

                        Section::make('Livestock & Farm Details')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Livestock')
                                        ->components([
                                            Text::make(fn ($record) => $record->livestock?->identification_number ?: 'Not specified')
                                                ->color('primary'),
                                        ]),

                                    Fieldset::make('Farm')
                                        ->components([
                                            Text::make(fn ($record) => $record->farm?->name ?: 'Not specified')
                                                ->color('info'),
                                        ]),

                                    Fieldset::make('Disease')
                                        ->components([
                                            Text::make(fn ($record) => $record->disease?->name ?: 'Not specified')
                                                ->color('danger'),
                                        ]),

                                    Fieldset::make('State')
                                        ->components([
                                            Text::make(fn ($record) => $record->state?->name ?: 'Not specified')
                                                ->color('warning'),
                                        ]),
                                ]),
                            ]),

                        Section::make('Additional Information')
                            ->components([
                                Grid::make(1)->components([
                                    Fieldset::make('Remarks')
                                        ->components([
                                            Text::make(fn ($record) => $record->remarks ?: 'No remarks provided')
                                                ->columnSpanFull(),
                                        ])
                                        ->columnSpanFull(),
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
