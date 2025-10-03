<?php

namespace App\Filament\Resources\WithdrawPeriodUnits\Pages;

use App\Filament\Resources\WithdrawPeriodUnits\WithdrawPeriodUnitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWithdrawPeriodUnits extends ListRecords
{
    protected static string $resource = WithdrawPeriodUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
