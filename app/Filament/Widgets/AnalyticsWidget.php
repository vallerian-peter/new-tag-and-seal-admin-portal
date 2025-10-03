<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Farmer;
use App\Models\Vet;
use App\Models\Livestock;
use App\Models\Feeding;
use App\Models\Medication;
use App\Models\Vaccination;
use App\Models\Insemination;
use App\Models\Milking;
use Filament\Widgets\ChartWidget;

class AnalyticsWidget extends ChartWidget
{
    protected ?string $heading = 'Analytics Dashboard';

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        // Get data for the last 12 months
        $months = [];
        $farmersData = [];
        $livestockData = [];
        $vetsData = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthName = $date->format('M Y');
            $months[] = $monthName;

            // Get cumulative counts up to this month
            $farmersData[] = Farmer::where('created_at', '<=', $date->endOfMonth())->count();
            $livestockData[] = Livestock::where('created_at', '<=', $date->endOfMonth())->count();
            $vetsData[] = Vet::where('created_at', '<=', $date->endOfMonth())->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Farmers',
                    'data' => $farmersData,
                    'borderColor' => 'rgb(34, 197, 94)', // Green
                    'backgroundColor' => 'rgba(34, 197, 94, 0.1)',
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Livestock',
                    'data' => $livestockData,
                    'borderColor' => 'rgb(245, 158, 11)', // Yellow
                    'backgroundColor' => 'rgba(245, 158, 11, 0.1)',
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Veterinarians',
                    'data' => $vetsData,
                    'borderColor' => 'rgb(59, 130, 246)', // Blue
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'tension' => 0.4,
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'position' => 'top',
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                ],
            ],
        ];
    }
}
