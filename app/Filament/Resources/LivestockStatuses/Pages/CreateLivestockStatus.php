<?php

namespace App\Filament\Resources\LivestockStatuses\Pages;

use App\Filament\Resources\LivestockStatuses\LivestockStatusResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLivestockStatus extends CreateRecord
{
    protected static string $resource = LivestockStatusResource::class;
}
