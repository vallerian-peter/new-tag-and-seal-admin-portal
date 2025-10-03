<?php

namespace App\Filament\Widgets;

use App\Models\Feeding;
use App\Models\Medication;
use App\Models\Vaccination;
use App\Models\Insemination;
use App\Models\Milking;
use Filament\Widgets\ChartWidget;

class LogTypesPieChartWidget extends ChartWidget
{
    protected ?string $heading = 'Log Types Distribution';

    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        // Get counts for each log type
        $feedingsCount = Feeding::count();
        $medicationsCount = Medication::count();
        $vaccinationsCount = Vaccination::count();
        $inseminationsCount = Insemination::count();
        $milkingsCount = Milking::count();

        $totalLogs = $feedingsCount + $medicationsCount + $vaccinationsCount + $inseminationsCount + $milkingsCount;

        // If no logs exist, return empty data
        if ($totalLogs === 0) {
            return [
                'datasets' => [
                    [
                        'data' => [1],
                        'backgroundColor' => ['rgb(156, 163, 175)'],
                    ],
                ],
                'labels' => ['No Data'],
            ];
        }

        return [
            'datasets' => [
                [
                    'data' => [
                        $feedingsCount,
                        $medicationsCount,
                        $vaccinationsCount,
                        $inseminationsCount,
                        $milkingsCount,
                    ],
                    'backgroundColor' => [
                        'rgb(34, 197, 94)',   // Green for Feedings
                        'rgb(245, 158, 11)',  // Yellow for Medications
                        'rgb(59, 130, 246)',  // Blue for Vaccinations
                        'rgb(239, 68, 68)',   // Red for Inseminations
                        'rgb(147, 51, 234)',  // Purple for Milkings
                    ],
                    'borderColor' => [
                        'rgb(34, 197, 94)',
                        'rgb(245, 158, 11)',
                        'rgb(59, 130, 246)',
                        'rgb(239, 68, 68)',
                        'rgb(147, 51, 234)',
                    ],
                    'borderWidth' => 2,
                ],
            ],
            'labels' => [
                'Feedings',
                'Medications',
                'Vaccinations',
                'Inseminations',
                'Milkings',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],
                'tooltip' => [
                    'enabled' => true,
                ],
            ],
        ];
    }
}
