<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            {{ $this->getHeading() }}
        </x-slot>

        <div class="space-y-4">
            <!-- Map Container -->
            <div class="relative">
                <div id="farm-map-{{ $this->getId() }}" class="w-full h-96 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800"></div>
            </div>

            @if($this->getViewData()['hasCoordinates'])
                <!-- Farm Locations List -->
                <div class="mt-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                        Farm Locations ({{ count($this->getViewData()['locations']) }})
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($this->getViewData()['locations'] as $location)
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow cursor-pointer"
                                 onclick="window.focusOnFarmLocation && window.focusOnFarmLocation({{ $location['lat'] }}, {{ $location['lng'] }}, '{{ addslashes($location['name']) }}')">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <div class="font-medium text-gray-900 dark:text-gray-100 flex items-center">
                                            <x-heroicon-o-map-pin class="w-4 h-4 text-primary-500 mr-2" />
                                            {{ $location['name'] }}
                                        </div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                            <div><strong>Farmers:</strong> {{ $location['farmers'] }}</div>
                                            <div><strong>Size:</strong> {{ $location['size'] }}</div>
                                            <div><strong>Coordinates:</strong> {{ number_format($location['lat'], 6) }}, {{ number_format($location['lng'], 6) }}</div>
                                            @if($location['address'])
                                                <div><strong>Address:</strong> {{ Str::limit($location['address'], 50) }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <x-heroicon-o-chevron-right class="w-5 h-5 text-gray-400" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <!-- Info message when no coordinates -->
                <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                    <div class="flex items-center">
                        <x-heroicon-o-information-circle class="w-5 h-5 text-blue-600 dark:text-blue-400 mr-2" />
                        <div class="text-sm text-blue-800 dark:text-blue-200">
                            <strong>No Farm Coordinates:</strong> Add GPS coordinates to farms to see location markers on the map.
                            <span class="block mt-1 text-xs">
                                Total Farms: {{ App\Models\Farm::count() }} |
                                With Coordinates: {{ App\Models\Farm::whereNotNull('latitudes')->whereNotNull('longitudes')->where('latitudes', '!=', '')->where('longitudes', '!=', '')->where('has_coordinates', true)->count() }}
                            </span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </x-filament::section>
</x-filament-widgets::widget>

@pushonce('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<style>
    .leaflet-container {
        font: inherit;
    }
</style>
@endpushonce

@pushonce('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('=== FARM MAP WIDGET INITIALIZATION ===');
    initializeFarmMapWidget();
});

document.addEventListener('livewire:navigated', function() {
    console.log('=== FARM MAP WIDGET RE-INITIALIZATION (Livewire) ===');
    setTimeout(function() {
        initializeFarmMapWidget();
    }, 500);
});

function initializeFarmMapWidget() {
    console.log('Starting farm map initialization...');

    const mapId = 'farm-map-{{ $this->getId() }}';
    const mapContainer = document.getElementById(mapId);

    if (!mapContainer) {
        console.error('Map container not found:', mapId);
        return;
    }

    console.log('Map container found:', mapContainer);

    // Check if Leaflet is loaded
    if (typeof L === 'undefined') {
        console.error('Leaflet not loaded! Retrying in 1 second...');
        setTimeout(initializeFarmMapWidget, 1000);
        return;
    }

    console.log('Leaflet is loaded:', typeof L);

    // Check if map already exists
    if (mapContainer._leaflet_id) {
        console.log('Map already initialized, skipping...');
        return;
    }

    try {
        // Get map data
        const mapData = @json($this->getViewData());
        console.log('Map data loaded:', mapData);

        // Initialize the map
        console.log('Creating map instance...');
        const map = L.map(mapId).setView([mapData.center.lat, mapData.center.lng], 8);
        window.farmMapInstance = map;
        console.log('Map instance created successfully');

        // Add tile layer
        console.log('Adding tile layer...');
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 19,
            tileSize: 256,
            zoomOffset: 0
        }).addTo(map);
        console.log('Tile layer added successfully');

        // Add markers if we have locations
        if (mapData.locations && mapData.locations.length > 0) {
            console.log('Adding markers for', mapData.locations.length, 'locations...');

            const markers = [];
            mapData.locations.forEach(function(location, index) {
                console.log('Adding marker', index + 1, ':', location.name);

                const marker = L.marker([location.lat, location.lng])
                    .addTo(map)
                    .bindPopup(`
                        <div style="min-width: 200px;">
                            <h3 style="font-weight: bold; margin-bottom: 8px;">${location.name}</h3>
                            <p style="margin: 4px 0;"><strong>Farmers:</strong> ${location.farmers}</p>
                            <p style="margin: 4px 0;"><strong>Size:</strong> ${location.size}</p>
                            <p style="margin: 4px 0;"><strong>Address:</strong> ${location.address || 'N/A'}</p>
                            <p style="margin: 4px 0;"><strong>GPS:</strong> ${location.lat.toFixed(6)}, ${location.lng.toFixed(6)}</p>
                        </div>
                    `);

                markers.push(marker);
                console.log('Marker added successfully');
            });

            // Fit bounds to show all markers
            if (markers.length > 0) {
                const group = new L.featureGroup(markers);
                map.fitBounds(group.getBounds().pad(0.1));
                console.log('Map bounds adjusted to show all markers');
            }
        } else {
            console.log('No locations with coordinates to display');
        }

        // Force a map resize after a short delay
        setTimeout(function() {
            map.invalidateSize();
            console.log('Map size invalidated');
        }, 100);

        console.log('=== MAP INITIALIZATION COMPLETE ===');

    } catch (error) {
        console.error('Error initializing map:', error);
        console.error('Error stack:', error.stack);
    }
}

// Global function to focus on a location
window.focusOnFarmLocation = function(lat, lng, name) {
    console.log('Focusing on location:', name, lat, lng);
    if (window.farmMapInstance) {
        window.farmMapInstance.setView([lat, lng], 15);

        // Find and open the marker popup
        window.farmMapInstance.eachLayer(function(layer) {
            if (layer instanceof L.Marker) {
                const latlng = layer.getLatLng();
                if (Math.abs(latlng.lat - lat) < 0.0001 && Math.abs(latlng.lng - lng) < 0.0001) {
                    layer.openPopup();
                }
            }
        });
    } else {
        console.error('Map instance not found');
    }
};
</script>
@endpushonce
