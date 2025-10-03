<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Farmer;
use App\Models\Vet;
use App\Models\Livestock;
use App\Models\Vaccine;
use App\Models\Feeding;
use App\Models\Medication;
use App\Models\Vaccination;
use App\Models\Insemination;
use App\Models\Milking;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class DashboardStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        // Get current counts
        $usersCount = User::count();
        $farmersCount = Farmer::count();
        $vetsCount = Vet::count();
        $livestockCount = Livestock::count();
        $vaccinesCount = Vaccine::count();

        // Get logs counts
        $feedingsCount = Feeding::count();
        $medicationsCount = Medication::count();
        $vaccinationsCount = Vaccination::count();
        $inseminationsCount = Insemination::count();
        $milkingsCount = Milking::count();

        return [
            // Top Row - Core Entities
            Stat::make('Users', $usersCount)
                ->description('System Users')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),

            Stat::make('Farmers', $farmersCount)
                ->description('Registered Farmers')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),

            Stat::make('Veterinarians', $vetsCount)
                ->description('Registered Vets')
                ->descriptionIcon('heroicon-m-user-plus')
                ->color('info'),

            Stat::make('Livestock', $livestockCount)
                ->description('Total Livestock')
                ->descriptionIcon('heroicon-m-cube')
                ->color('warning')
                ->chart($this->getLivestockChartData())
                ->description($this->getTrendDescription('Livestock', $this->calculateTrend(Livestock::class, 'created_at')))
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),

            Stat::make('Vaccines', $vaccinesCount)
                ->description('Available Vaccines')
                ->descriptionIcon('heroicon-m-shield-check')
                ->color('danger'),

            // Bottom Row - Logs & Records
            Stat::make('Feedings', $feedingsCount)
                ->description($this->getTrendDescription('Feedings', $this->calculateTrend(Feeding::class, 'created_at')))
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('success')
                ->chart($this->getLogsChartData(Feeding::class))
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),

            Stat::make('Medications', $medicationsCount)
                ->description($this->getTrendDescription('Medications', $this->calculateTrend(Medication::class, 'created_at')))
                ->descriptionIcon('heroicon-m-beaker')
                ->color('warning')
                ->chart($this->getLogsChartData(Medication::class))
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),

            Stat::make('Vaccinations', $vaccinationsCount)
                ->description($this->getTrendDescription('Vaccinations', $this->calculateTrend(Vaccination::class, 'created_at')))
                ->descriptionIcon('heroicon-m-shield-check')
                ->color('info')
                ->chart($this->getLogsChartData(Vaccination::class))
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),

            Stat::make('Inseminations', $inseminationsCount)
                ->description($this->getTrendDescription('Inseminations', $this->calculateTrend(Insemination::class, 'created_at')))
                ->descriptionIcon('heroicon-m-heart')
                ->color('danger')
                ->chart($this->getLogsChartData(Insemination::class))
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),

            Stat::make('Milkings', $milkingsCount)
                ->description($this->getTrendDescription('Milkings', $this->calculateTrend(Milking::class, 'created_at')))
                ->descriptionIcon('heroicon-m-beaker')
                ->color('primary')
                ->chart($this->getLogsChartData(Milking::class))
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),
        ];
    }

    private function getLivestockChartData()
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $count = Livestock::whereDate('created_at', $date)->count();
            $data[] = $count;
        }
        return $data;
    }

    private function getLogsChartData($model)
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $count = $model::whereDate('created_at', $date)->count();
            $data[] = $count;
        }
        return $data;
    }

    private function calculateTrend($model, $dateColumn)
    {
        $now = now();
        $last30Days = $now->copy()->subDays(30);
        $previous30Days = $now->copy()->subDays(60);

        $currentPeriod = $model::where($dateColumn, '>=', $last30Days)->count();
        $previousPeriod = $model::whereBetween($dateColumn, [$previous30Days, $last30Days])->count();

        if ($previousPeriod == 0) {
            return $currentPeriod > 0 ? 100 : 0;
        }

        return round((($currentPeriod - $previousPeriod) / $previousPeriod) * 100, 1);
    }

    private function getTrendDescription($type, $trend)
    {
        if ($trend > 0) {
            return "{$type} Records - ↑ {$trend}% vs last month";
        } elseif ($trend < 0) {
            return "{$type} Records - ↓ " . abs($trend) . "% vs last month";
        } else {
            return "{$type} Records - No change vs last month";
        }
    }
}
