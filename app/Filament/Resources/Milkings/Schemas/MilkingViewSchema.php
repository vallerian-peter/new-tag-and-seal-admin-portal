<?php

namespace App\Filament\Resources\Milkings\Schemas;

use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class MilkingViewSchema
{
    public static function configure(Schema $schema, $record): Schema
    {
        return $schema
            ->record($record)
            ->components([
                Grid::make(1) // All sections stack full-width
                    ->columnSpanFull()
                    ->components([
                        Section::make('Milking Information')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Reference Number')
                                        ->components([
                                            Text::make(fn ($record) => $record->reference_no)
                                                ->color('primary')
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Amount')
                                        ->components([
                                            Text::make(fn ($record) => $record->amount ?: 'Not provided')
                                                ->color('info')
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Lactometer Reading')
                                        ->components([
                                            Text::make(fn ($record) => $record->lactometer_reading ?: 'Not provided'),
                                        ]),

                                    Fieldset::make('Corrected Lactometer Reading')
                                        ->components([
                                            Text::make(fn ($record) => $record->corrected_lactometer_reading ?: 'Not provided'),
                                        ]),
                                ]),
                            ]),

                        Section::make('Milk Quality Analysis')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Solid')
                                        ->components([
                                            Text::make(fn ($record) => $record->solid ?: 'Not provided')
                                                ->color('success'),
                                        ]),

                                    Fieldset::make('Solid Non Fat')
                                        ->components([
                                            Text::make(fn ($record) => $record->solid_non_fat ?: 'Not provided')
                                                ->color('info'),
                                        ]),

                                    Fieldset::make('Protein')
                                        ->components([
                                            Text::make(fn ($record) => $record->protein ?: 'Not provided')
                                                ->color('warning'),
                                        ]),

                                    Fieldset::make('Total Solids')
                                        ->components([
                                            Text::make(fn ($record) => $record->total_solids ?: 'Not provided')
                                                ->color('primary'),
                                        ]),

                                    Fieldset::make('Colony Forming Units')
                                        ->components([
                                            Text::make(fn ($record) => $record->colony_forming_units ?: 'Not provided'),
                                        ]),

                                    Fieldset::make('Acidity')
                                        ->components([
                                            Text::make(fn ($record) => $record->acidity ?: 'Not provided'),
                                        ]),
                                ]),
                            ]),

                        Section::make('Milking Details')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Livestock')
                                        ->components([
                                            Text::make(fn ($record) => $record->livestock?->identification_number ?: 'Not specified')
                                                ->color('primary'),
                                        ]),

                                    Fieldset::make('Milking Session')
                                        ->components([
                                            Text::make(fn ($record) => $record->milkingSession?->name ?: 'Not specified')
                                                ->color('info'),
                                        ]),

                                    Fieldset::make('Milking Method')
                                        ->components([
                                            Text::make(fn ($record) => $record->milkingMethod?->name ?: 'Not specified')
                                                ->color('success'),
                                        ]),

                                    Fieldset::make('Milking Unit')
                                        ->components([
                                            Text::make(fn ($record) => $record->milkingUnit?->name ?: 'Not specified')
                                                ->color('warning'),
                                        ]),

                                    Fieldset::make('Milking Status')
                                        ->components([
                                            Text::make(fn ($record) => $record->milkingStatus?->name ?: 'Not specified')
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
