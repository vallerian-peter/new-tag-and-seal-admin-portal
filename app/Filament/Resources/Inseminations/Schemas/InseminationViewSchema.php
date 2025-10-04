<?php

namespace App\Filament\Resources\Inseminations\Schemas;

use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Text;
use Filament\Schemas\Schema;

class InseminationViewSchema
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
                                                    ->weight('bold'),
                                            ]),
                                        Fieldset::make('Serial')
                                            ->components([
                                                Text::make(fn () => $record->serial ?: 'Not specified')
                                                    ->color('info'),
                                            ]),
                                        Fieldset::make('Livestock')
                                            ->components([
                                                Text::make(fn () => $record->livestock ? $record->livestock->name : 'N/A')
                                                    ->color('primary'),
                                            ]),
                                        Fieldset::make('State')
                                            ->components([
                                                Text::make(fn () => $record->state ? $record->state->name : 'N/A')
                                                    ->color('success'),
                                            ]),
                                    ]),
                            ]),

                        Section::make('Heat Information')
                            ->components([
                                Grid::make(2)
                                    ->components([
                                        Fieldset::make('Last Heat Date')
                                            ->components([
                                                Text::make(fn () => $record->last_heat_date ? $record->last_heat_date->format('M d, Y') : 'Not specified')
                                                    ->color('warning'),
                                            ]),
                                        Fieldset::make('Current Heat Type')
                                            ->components([
                                                Text::make(fn () => $record->currentHeatType ? $record->currentHeatType->name : 'N/A')
                                                    ->color('info'),
                                            ]),
                                    ]),
                            ]),

                        Section::make('Insemination Details')
                            ->components([
                                Grid::make(2)
                                    ->components([
                                        Fieldset::make('Insemination Date')
                                            ->components([
                                                Text::make(fn () => $record->insemination_date ? $record->insemination_date->format('M d, Y') : 'Not specified')
                                                    ->weight('bold')
                                                    ->color('primary'),
                                            ]),
                                        Fieldset::make('Insemination Service')
                                            ->components([
                                                Text::make(fn () => $record->inseminationService ? $record->inseminationService->name : 'N/A')
                                                    ->color('success'),
                                            ]),
                                        Fieldset::make('Semen Straw Type')
                                            ->components([
                                                Text::make(fn () => $record->semenStrawType ? $record->semenStrawType->name : 'N/A')
                                                    ->color('info'),
                                            ]),
                                        Fieldset::make('Bull Code')
                                            ->components([
                                                Text::make(fn () => $record->bull_code ?: 'Not specified')
                                                    ->weight('bold'),
                                            ]),
                                    ]),
                            ]),

                        Section::make('Bull Information')
                            ->components([
                                Grid::make(2)
                                    ->components([
                                        Fieldset::make('Bull Breed')
                                            ->components([
                                                Text::make(fn () => $record->bull_breed ?: 'Not specified')
                                                    ->color('primary'),
                                            ]),
                                        Fieldset::make('Semen Production Date')
                                            ->components([
                                                Text::make(fn () => $record->semen_production_date ? $record->semen_production_date->format('M d, Y') : 'Not specified')
                                                    ->color('warning'),
                                            ]),
                                        Fieldset::make('Production Country')
                                            ->components([
                                                Text::make(fn () => $record->production_country ?: 'Not specified')
                                                    ->color('info'),
                                            ]),
                                        Fieldset::make('Semen Batch Number')
                                            ->components([
                                                Text::make(fn () => $record->semen_batch_number ?: 'Not specified')
                                                    ->weight('bold'),
                                            ]),
                                    ]),
                            ]),

                        Section::make('Identification & Supplier')
                            ->components([
                                Grid::make(2)
                                    ->components([
                                        Fieldset::make('International ID')
                                            ->components([
                                                Text::make(fn () => $record->international_id ?: 'Not specified')
                                                    ->color('primary'),
                                            ]),
                                        Fieldset::make('AI Code')
                                            ->components([
                                                Text::make(fn () => $record->ai_code ?: 'Not specified')
                                                    ->color('success'),
                                            ]),
                                        Fieldset::make('Manufacturer Name')
                                            ->components([
                                                Text::make(fn () => $record->manufacturer_name ?: 'Not specified')
                                                    ->color('info'),
                                            ]),
                                        Fieldset::make('Semen Supplier')
                                            ->components([
                                                Text::make(fn () => $record->semen_supplier ?: 'Not specified')
                                                    ->color('warning'),
                                            ]),
                                    ]),
                            ]),

                        Section::make('System Information')
                            ->components([
                                Grid::make(2)
                                    ->components([
                                        Fieldset::make('UUID')
                                            ->components([
                                                Text::make(fn () => $record->uuid ?: 'Not generated')
                                                    ->color('info')
                                                    ->size('sm'),
                                            ]),
                                        Fieldset::make('Created By')
                                            ->components([
                                                Text::make(fn () => $record->createdBy ? $record->createdBy->username : 'N/A')
                                                    ->color('success'),
                                            ]),
                                        Fieldset::make('Updated By')
                                            ->components([
                                                Text::make(fn () => $record->updatedBy ? $record->updatedBy->username : 'N/A')
                                                    ->color('warning'),
                                            ]),
                                        Fieldset::make('Created At')
                                            ->components([
                                                Text::make(fn () => $record->created_at ? $record->created_at->format('M d, Y H:i') : 'N/A')
                                                    ->color('info'),
                                            ]),
                                    ]),
                            ]),

                        Section::make('Sync Information')
                            ->components([
                                Grid::make(2)
                                    ->components([
                                        Fieldset::make('Last Modified At')
                                            ->components([
                                                Text::make(fn () => $record->last_modified_at ? $record->last_modified_at->format('M d, Y H:i') : 'N/A')
                                                    ->color('info'),
                                            ]),
                                        Fieldset::make('Sync Status')
                                            ->components([
                                                Text::make(fn () => $record->sync_status ?: 'Not synced')
                                                    ->color(fn () => match ($record->sync_status) {
                                                        'synced' => 'success',
                                                        'pending' => 'warning',
                                                        'failed' => 'danger',
                                                        default => 'secondary',
                                                    }),
                                            ]),
                                        Fieldset::make('Device ID')
                                            ->components([
                                                Text::make(fn () => $record->device_id ?: 'N/A')
                                                    ->color('info'),
                                            ]),
                                        Fieldset::make('Original Created At')
                                            ->components([
                                                Text::make(fn () => $record->original_created_at ? $record->original_created_at->format('M d, Y H:i') : 'N/A')
                                                    ->color('info'),
                                            ]),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
