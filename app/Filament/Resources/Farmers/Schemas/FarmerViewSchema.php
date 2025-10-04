<?php

namespace App\Filament\Resources\Farmers\Schemas;

use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Icon;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class FarmerViewSchema
{
    public static function configure(Schema $schema, $record): Schema
    {
        return $schema
            ->record($record)
            ->components([
                Grid::make(1) // All sections stack full-width
                    ->columnSpanFull()
                    ->components([
                        Section::make('Personal Information')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Farmer Number')
                                        ->components([
                                            Text::make(fn ($record) => $record->farmer_no)
                                                ->color('primary')
                                                ->weight('bold'),
                                        ]),

                                    Fieldset::make('Full Name')
                                        ->components([
                                            Text::make(fn ($record) => $record->first_name . ' ' . $record->surname)
                                                ->weight('bold')
                                                ->size('lg'),
                                        ]),

                                    Fieldset::make('Middle Name')
                                        ->components([
                                            Text::make(fn ($record) => $record->middle_name ?: 'Not provided'),
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

                                    Fieldset::make('Phone Number')
                                        ->components([
                                            Text::make(fn ($record) => $record->phone_number ?: 'Not provided'),
                                        ]),
                                ]),
                            ]),

                        Section::make('Contact Information')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Email')
                                        ->components([
                                            Text::make(fn ($record) => $record->email ?: 'Not provided'),
                                        ]),

                                    Fieldset::make('Physical Address')
                                        ->components([
                                            Text::make(fn ($record) => $record->physical_address ?: 'Not provided'),
                                        ]),

                                    Fieldset::make('Street')
                                        ->components([
                                            Text::make(fn ($record) => $record->street?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Village')
                                        ->components([
                                            Text::make(fn ($record) => $record->village?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Ward')
                                        ->components([
                                            Text::make(fn ($record) => $record->ward?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('District')
                                        ->components([
                                            Text::make(fn ($record) => $record->district?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Region')
                                        ->components([
                                            Text::make(fn ($record) => $record->region?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Country')
                                        ->components([
                                            Text::make(fn ($record) => $record->country?->name ?: 'Not specified'),
                                        ]),
                                ]),
                            ]),

                        Section::make('Education & Status')
                            ->components([
                                Grid::make(2)->components([
                                    Fieldset::make('Education Level')
                                        ->components([
                                            Text::make(fn ($record) => $record->educationLevel?->name ?: 'Not specified')
                                                ->color('warning'),
                                        ]),

                                    Fieldset::make('School Level')
                                        ->components([
                                            Text::make(fn ($record) => $record->schoolLevel?->name ?: 'Not specified')
                                                ->color('info'),
                                        ]),

                                    Fieldset::make('Identity Card Type')
                                        ->components([
                                            Text::make(fn ($record) => $record->identityCardType?->name ?: 'Not specified'),
                                        ]),

                                    Fieldset::make('Identity Card Number')
                                        ->components([
                                            Text::make(fn ($record) => $record->identity_card_number ?: 'Not provided'),
                                        ]),

                                    Fieldset::make('Is Active')
                                        ->components([
                                            Icon::make(fn ($record) => $record->is_active ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
                                                ->color(fn ($record) => $record->is_active ? 'success' : 'danger'),
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
