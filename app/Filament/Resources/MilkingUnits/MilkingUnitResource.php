<?php

namespace App\Filament\Resources\MilkingUnits;

use App\Filament\Resources\MilkingUnits\Pages\CreateMilkingUnit;
use App\Filament\Resources\MilkingUnits\Pages\EditMilkingUnit;
use App\Filament\Resources\MilkingUnits\Pages\ListMilkingUnits;
use App\Filament\Resources\MilkingUnits\Schemas\MilkingUnitForm;
use App\Filament\Resources\MilkingUnits\Tables\MilkingUnitsTable;
use App\Models\MilkingUnit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MilkingUnitResource extends Resource
{
    protected static ?string $model = MilkingUnit::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cube';

    public static function form(Schema $schema): Schema
    {
        return MilkingUnitForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MilkingUnitsTable::configure($table);
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
            'index' => ListMilkingUnits::route('/'),
            'create' => CreateMilkingUnit::route('/create'),
            'edit' => EditMilkingUnit::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 16;

    public static function getNavigationGroup(): ?string
    {
        return 'Livestock & Data';
    }
}
