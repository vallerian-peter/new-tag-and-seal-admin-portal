<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Icon;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class UserViewSchema
{
    public static function configure(Schema $schema, $record): Schema
    {
        return $schema
            ->record($record)
            ->components([
                Grid::make(1) // All sections stack full-width
                    ->columnSpanFull()
                    ->components([
                        Section::make('User Authentication')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Username')
                                        ->components([
                                            Text::make(fn ($record) => $record->username)
                                                ->color('primary')
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Profile Type')
                                        ->components([
                                            Text::make(fn ($record) => $record->profile ?: 'Not specified')
                                                ->color('info')
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Full Name')
                                        ->components([
                                            Text::make(fn ($record) => $record->name ?: 'Not provided')
                                                ->weight('bold')
                                                ->size('lg'),
                                        ]),

                                    Fieldset::make('Email')
                                        ->components([
                                            Text::make(fn ($record) => $record->email ?: 'Not provided'),
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

                                    Fieldset::make('Last Login')
                                        ->components([
                                            Text::make(fn ($record) => $record->last_login_at ? $record->last_login_at->format('M d, Y H:i') . ' (' . $record->last_login_at->diffForHumans() . ')' : 'Never logged in'),
                                        ]),

                                    Fieldset::make('Status')
                                        ->components([
                                            Icon::make(fn ($record) => $record->is_active ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
                                                ->color(fn ($record) => $record->is_active ? 'success' : 'danger'),
                                        ]),
                                ]),
                            ])
                            ->collapsible(),
                    ]),
            ]);
    }
}
