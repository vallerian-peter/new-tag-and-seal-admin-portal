<?php

namespace App\Filament\Resources\Weights\Schemas;

use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Icon;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Schema;

class WeightViewSchema
{
    public static function configure(Schema $schema, $record): Schema
    {
        return $schema
            ->components([
                Grid::make(1)
                    ->columnSpanFull()
                    ->components([
                        Section::make('Basic Information')
                            ->components([
                                Grid::make(2)
                                    ->components([
                                        Fieldset::make('Reference Number')
                                            ->components([
                                                Text::make(fn () => $record->reference_no ?: 'Not specified')
                                                    ->color('info')
                                                    ->weight('bold'),
                                            ]),

                                        Fieldset::make('UUID')
                                            ->components([
                                                Text::make(fn () => $record->uuid ?: 'Not generated')
                                                    ->color('info')
                                                    ->size('sm'),
                                            ]),

                                        Fieldset::make('Farm')
                                            ->components([
                                                Text::make(fn () => $record->farm?->name ?: 'Not specified')
                                                    ->color('primary')
                                                    ->weight('bold'),
                                            ]),

                                        Fieldset::make('Livestock')
                                            ->components([
                                                Text::make(fn () => $record->livestock?->name ?: 'Not specified')
                                                    ->color('primary')
                                                    ->weight('bold'),
                                            ]),

                                        Fieldset::make('Weight')
                                            ->components([
                                                Text::make(fn () => $record->weight ? $record->weight . ' ' . ($record->weightUnit?->name ?? '') : 'Not specified')
                                                    ->color('success')
                                                    ->weight('bold'),
                                            ]),

                                        Fieldset::make('Weight Gain')
                                            ->components([
                                                Text::make(fn () => $record->weight_gain ? $record->weight_gain . ' ' . ($record->weightUnit?->name ?? '') : 'Not specified')
                                                    ->color(fn () => $record->weight_gain >= 0 ? 'success' : 'danger')
                                                    ->weight('bold'),
                                            ]),

                                        Fieldset::make('Weight Unit')
                                            ->components([
                                                Text::make(fn () => $record->weightUnit?->name ?: 'Not specified')
                                                    ->color('info')
                                                    ->weight('bold'),
                                            ]),

                                        Fieldset::make('State')
                                            ->components([
                                                Text::make(fn () => $record->state?->name ?: 'Not specified')
                                                    ->color('secondary')
                                                    ->weight('bold'),
                                            ]),
                                    ]),
                            ]),

                        Section::make('Additional Information')
                            ->components([
                                Grid::make(2)
                                    ->components([
                                        Fieldset::make('Remarks')
                                            ->components([
                                                Text::make(fn () => $record->remarks ?: 'No remarks')
                                                    ->color('gray')
                                                    ->columnSpanFull(),
                                            ]),

                                        Fieldset::make('Created By')
                                            ->components([
                                                Text::make(fn () => $record->createdBy?->username ?: 'System')
                                                    ->color('info')
                                                    ->weight('bold'),
                                            ]),

                                        Fieldset::make('Updated By')
                                            ->components([
                                                Text::make(fn () => $record->updatedBy?->username ?: 'System')
                                                    ->color('info')
                                                    ->weight('bold'),
                                            ]),
                                    ]),
                            ]),

                        Section::make('Sync Information')
                            ->components([
                                Grid::make(2)
                                    ->components([
                                        Fieldset::make('Sync Status')
                                            ->components([
                                                Text::make(fn () => $record->sync_status ?: 'Not synced')
                                                    ->color(fn () => match ($record->sync_status) {
                                                        'synced' => 'success',
                                                        'pending' => 'warning',
                                                        'failed' => 'danger',
                                                        default => 'secondary',
                                                    })
                                                    ->weight('bold'),
                                            ]),

                                        Fieldset::make('Device ID')
                                            ->components([
                                                Text::make(fn () => $record->device_id ?: 'Not specified')
                                                    ->color('info')
                                                    ->size('sm'),
                                            ]),

                                        Fieldset::make('Last Modified')
                                            ->components([
                                                Text::make(fn () => $record->last_modified_at ? $record->last_modified_at->format('Y-m-d H:i:s') : 'Not specified')
                                                    ->color('gray'),
                                            ]),

                                        Fieldset::make('Original Created')
                                            ->components([
                                                Text::make(fn () => $record->original_created_at ? $record->original_created_at->format('Y-m-d H:i:s') : 'Not specified')
                                                    ->color('gray'),
                                            ]),
                                    ]),
                            ]),

                        Section::make('Timestamps')
                            ->components([
                                Grid::make(2)
                                    ->components([
                                        Fieldset::make('Created At')
                                            ->components([
                                                Text::make(fn () => $record->created_at ? $record->created_at->format('Y-m-d H:i:s') : 'Not specified')
                                                    ->color('gray'),
                                            ]),

                                        Fieldset::make('Updated At')
                                            ->components([
                                                Text::make(fn () => $record->updated_at ? $record->updated_at->format('Y-m-d H:i:s') : 'Not specified')
                                                    ->color('gray'),
                                            ]),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
