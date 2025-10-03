<?php

namespace App\Filament\Resources\WithdrawPeriodUnits;

use App\Filament\Resources\WithdrawPeriodUnits\Pages\CreateWithdrawPeriodUnit;
use App\Filament\Resources\WithdrawPeriodUnits\Pages\EditWithdrawPeriodUnit;
use App\Filament\Resources\WithdrawPeriodUnits\Pages\ListWithdrawPeriodUnits;
use App\Filament\Resources\WithdrawPeriodUnits\Schemas\WithdrawPeriodUnitForm;
use App\Filament\Resources\WithdrawPeriodUnits\Tables\WithdrawPeriodUnitsTable;
use App\Models\WithdrawPeriodUnit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WithdrawPeriodUnitResource extends Resource
{
    protected static ?string $model = WithdrawPeriodUnit::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clock';

    public static function form(Schema $schema): Schema
    {
        return WithdrawPeriodUnitForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WithdrawPeriodUnitsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWithdrawPeriodUnits::route('/'),
            'create' => CreateWithdrawPeriodUnit::route('/create'),
            'edit' => EditWithdrawPeriodUnit::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'success';
    }

    protected static ?int $navigationSort = 9;

    public static function getNavigationGroup(): ?string
    {
        return 'System & Configuration';
    }
}
