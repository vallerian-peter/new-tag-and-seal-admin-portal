<?php

namespace App\Filament\Resources\WithdrawPeriodUnits\Pages;

use App\Filament\Resources\WithdrawPeriodUnits\WithdrawPeriodUnitResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWithdrawPeriodUnit extends EditRecord
{
    protected static string $resource = WithdrawPeriodUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
