<?php

namespace App\Filament\Resources\Species\Schemas;

use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class SpeciesViewSchema
{
    public static function configure(Schema $schema, $record): Schema
    {
        return $schema
            ->record($record)
            ->components([
                Grid::make(1) // All sections stack full-width
                    ->columnSpanFull()
                    ->components([
                        Section::make('Species Information')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Name')
                                        ->components([
                                            Text::make(fn ($record) => $record->name)
                                                ->color('primary')
                                                ->weight('bold')
                                                ->size('lg'),
                                        ]),

                                    Fieldset::make('Color')
                                        ->components([
                                            Text::make(fn ($record) => $record->color ?: 'Not specified')
                                                ->color('info'),
                                        ]),
                                ]),
                            ]),

                        Section::make('System Information')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Created At')
                                        ->components([
                                            Text::make(fn ($record) => $record->created_at?->format('M d, Y H:i') . ' (' . $record->created_at?->diffForHumans() . ')'),
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
