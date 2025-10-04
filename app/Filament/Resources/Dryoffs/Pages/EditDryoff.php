<?php

namespace App\Filament\Resources\Dryoffs\Pages;

use App\Filament\Resources\Dryoffs\DryoffResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDryoff extends EditRecord
{
    protected static string $resource = DryoffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
