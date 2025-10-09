<?php

namespace App\Filament\Resources\Vaccines\Schemas;

use Filament\Schemas\Components\Text;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class VaccineViewSchema
{
    public static function configure(Schema $schema, $record): Schema
    {
        return $schema
            ->record($record)
            ->components([
                Grid::make(1)->columnSpanFull()->components([
                    Section::make('Vaccine Information')->components([
                        Grid::make(2)->components([
                            Fieldset::make('Basic Details')->components([
                                Text::make(fn ($record) => 'Name: ' . ($record->name ?? 'N/A')),
                                Text::make(fn ($record) => 'Lot Number: ' . ($record->lot ?? 'N/A')),
                                Text::make(fn ($record) => 'Formulation Type: ' . ($record->formulation_type ?? 'N/A')),
                                Text::make(fn ($record) => 'Dose: ' . ($record->dose ?? 'N/A')),
                            ]),
                            Fieldset::make('Classification')->components([
                                Text::make(fn ($record) => 'Status: ' . ($record->vaccineStatus?->name ?? 'N/A')),
                                Text::make(fn ($record) => 'Type: ' . ($record->vaccineType?->name ?? 'N/A')),
                                Text::make(fn ($record) => 'Schedule: ' . ($record->vaccineSchedule?->name ?? 'N/A')),
                            ]),
                        ]),
                    ]),

                    Section::make('Farm Assignment')->components([
                        Grid::make(1)->components([
                            Text::make(fn ($record) => $record->farm ?
                                'Assigned to Farm: ' . $record->farm->name . ' (' . $record->farm->reference_no . ')' :
                                'No Farm Assigned'
                            ),
                        ]),
                    ]),

                    Section::make('Diseases This Vaccine Treats')->components([
                        Grid::make(1)->components([
                            Text::make(fn ($record) => $record->diseases->isNotEmpty() ?
                                'Treats: ' . $record->diseases->pluck('name')->join(', ') :
                                'No Diseases Assigned'
                            ),
                        ]),
                    ]),

                    Section::make('System Information')->components([
                        Grid::make(2)->components([
                            Fieldset::make('Created')->components([
                                Text::make(fn ($record) => 'Created By: ' . ($record->createdBy?->full_name ?? 'N/A')),
                                Text::make(fn ($record) => 'Created At: ' . ($record->created_at?->format('Y-m-d H:i:s') ?? 'N/A')),
                            ]),
                            Fieldset::make('Updated')->components([
                                Text::make(fn ($record) => 'Updated By: ' . ($record->updatedBy?->full_name ?? 'N/A')),
                                Text::make(fn ($record) => 'Updated At: ' . ($record->updated_at?->format('Y-m-d H:i:s') ?? 'N/A')),
                            ]),
                        ]),
                    ]),
                ]),
            ]);
    }
}
