<?php

namespace App\Filament\Resources\Livestocks\Schemas;

use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Icon;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class LivestockViewSchema
{
    public static function configure(Schema $schema, $record): Schema
    {
        return $schema
            ->record($record)
            ->components([
                Grid::make(1) // All sections stack full-width
                    ->columnSpanFull()
                    ->components([
                        Section::make('Livestock Information')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Identification Number')
                                        ->components([
                                            Text::make(fn ($record) => $record->identification_number)
                                                ->color('primary')
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Name')
                                        ->components([
                                            Text::make(fn ($record) => $record->name ?: 'Not provided')
                                                ->weight('bold')
                                                ->size('lg'),
                                        ]),

                                    Fieldset::make('Date of Birth')
                                        ->components([
                                            Text::make(fn ($record) => $record->date_of_birth?->format('M d, Y') ?: 'Not provided'),
                                        ]),

                                    Fieldset::make('Gender')
                                        ->components([
                                            Text::make(fn ($record) => $record->gender?->name ?: 'Not specified')
                                                ->color('info'),
                                        ]),

                                    Fieldset::make('Species')
                                        ->components([
                                            Text::make(fn ($record) => $record->species?->name ?: 'Not specified')
                                                ->color('warning'),
                                        ]),

                                    Fieldset::make('Breed')
                                        ->components([
                                            Text::make(fn ($record) => $record->breed?->name ?: 'Not specified'),
                                        ]),
                                ]),
                            ]),

                        Section::make('Livestock Details')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Livestock Type')
                                        ->components([
                                            Text::make(fn ($record) => $record->livestockType?->name ?: 'Not specified')
                                                ->color('success'),
                                        ]),

                                    Fieldset::make('Status')
                                        ->components([
                                            Text::make(fn ($record) => $record->livestockStatus?->name ?: 'Not specified')
                                                ->color(fn ($record) => match (strtolower($record->livestockStatus?->name ?? '')) {
                                                    'active' => 'success',
                                                    'inactive' => 'danger',
                                                    'sold' => 'warning',
                                                    default => 'secondary',
                                                })
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Obtained Method')
                                        ->components([
                                            Text::make(fn ($record) => $record->livestockObtainedMethod?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Mother')
                                        ->components([
                                            Text::make(fn ($record) => $record->mother?->identification_number ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Father')
                                        ->components([
                                            Text::make(fn ($record) => $record->father?->identification_number ?: 'Not specified'),
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
