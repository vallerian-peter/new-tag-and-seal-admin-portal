<?php

namespace App\Filament\Resources\MedicineQuantityUnits;

use App\Filament\Resources\MedicineQuantityUnits\Pages\CreateMedicineQuantityUnit;
use App\Filament\Resources\MedicineQuantityUnits\Pages\EditMedicineQuantityUnit;
use App\Filament\Resources\MedicineQuantityUnits\Pages\ListMedicineQuantityUnits;
use App\Filament\Resources\MedicineQuantityUnits\Schemas\MedicineQuantityUnitForm;
use App\Filament\Resources\MedicineQuantityUnits\Tables\MedicineQuantityUnitsTable;
use App\Models\MedicineQuantityUnit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MedicineQuantityUnitResource extends Resource
{
    protected static ?string $model = MedicineQuantityUnit::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-scale';

    public static function form(Schema $schema): Schema
    {
        return MedicineQuantityUnitForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MedicineQuantityUnitsTable::configure($table);
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
            'index' => ListMedicineQuantityUnits::route('/'),
            'create' => CreateMedicineQuantityUnit::route('/create'),
            'edit' => EditMedicineQuantityUnit::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 4;

    public static function getNavigationGroup(): ?string
    {
        return 'System & Configuration';
    }
}
