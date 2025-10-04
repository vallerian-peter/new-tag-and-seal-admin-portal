<?php

namespace App\Filament\Widgets;

use App\Models\Farm;
use Filament\Widgets\Widget;

class FarmLocationMapWidget extends Widget
{
    protected string $view = 'filament.widgets.farm-location-map';

    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 'full';

    public function getHeading(): string
    {
        return 'Farm Locations Map';
    }

    public function getViewData(): array
    {
        // Get farms with actual coordinates
        $farms = Farm::whereNotNull('latitudes')
            ->whereNotNull('longitudes')
            ->where('latitudes', '!=', '')
            ->where('longitudes', '!=', '')
            ->where('has_coordinates', true)
            ->with(['farmOwners.farmer', 'sizeUnit'])
            ->get();

        $locations = [];
        $bounds = null;

        foreach ($farms as $farm) {
            $lat = (float) $farm->latitudes;
            $lng = (float) $farm->longitudes;

            // Validate coordinates
            if ($lat >= -90 && $lat <= 90 && $lng >= -180 && $lng <= 180) {
                $farmers = $farm->farmOwners->map(function ($farmOwner) {
                    return $farmOwner->farmer ?
                        $farmOwner->farmer->first_name . ' ' . $farmOwner->farmer->surname :
                        'Unknown Farmer';
                })->join(', ');

                $locations[] = [
                    'id' => $farm->id,
                    'name' => $farm->name,
                    'lat' => $lat,
                    'lng' => $lng,
                    'farmers' => $farmers ?: 'No farmers assigned',
                    'address' => $farm->physical_address ?: 'No address',
                    'size' => $farm->size ? $farm->size . ' ' . ($farm->sizeUnit ? $farm->sizeUnit->name : 'units') : 'Size not specified',
                ];

                // Calculate bounds
                if ($bounds === null) {
                    $bounds = ['minLat' => $lat, 'maxLat' => $lat, 'minLng' => $lng, 'maxLng' => $lng];
                } else {
                    $bounds['minLat'] = min($bounds['minLat'], $lat);
                    $bounds['maxLat'] = max($bounds['maxLat'], $lat);
                    $bounds['minLng'] = min($bounds['minLng'], $lng);
                    $bounds['maxLng'] = max($bounds['maxLng'], $lng);
                }
            }
        }

        return [
            'locations' => $locations,
            'bounds' => $bounds,
            'center' => $bounds ? [
                'lat' => ($bounds['minLat'] + $bounds['maxLat']) / 2,
                'lng' => ($bounds['minLng'] + $bounds['maxLng']) / 2,
            ] : ['lat' => -6.200000, 'lng' => 35.000000], // Tanzania center as fallback
            'hasCoordinates' => !empty($locations),
        ];
    }
}
