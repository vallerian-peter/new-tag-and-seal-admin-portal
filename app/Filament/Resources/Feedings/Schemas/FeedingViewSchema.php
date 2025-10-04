<?php

namespace App\Filament\Resources\Feedings\Schemas;

use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class FeedingViewSchema
{
    public static function configure(Schema $schema, $record): Schema
    {
        return $schema
            ->record($record)
            ->components([
                Grid::make(1) // All sections stack full-width
                    ->columnSpanFull()
                    ->components([
                        Section::make('Feeding Information')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Reference Number')
                                        ->components([
                                            Text::make(fn ($record) => $record->reference_no)
                                                ->color('primary')
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Feeding Time')
                                        ->components([
                                            Text::make(fn ($record) => $record->feeding_time?->format('M d, Y H:i') ?: 'Not provided')
                                                ->color('info')
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Amount')
                                        ->components([
                                            Text::make(fn ($record) => $record->amount ?: 'Not specified')
                                                ->color('warning'),
                                        ]),

                                    Fieldset::make('Feeding Type')
                                        ->components([
                                            Text::make(fn ($record) => $record->feedingType?->name ?: 'Not specified')
                                                ->color('success'),
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
