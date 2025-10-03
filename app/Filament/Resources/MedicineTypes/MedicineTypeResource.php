<?php

namespace App\Filament\Resources\MedicineTypes;

use App\Filament\Resources\MedicineTypes\Pages\CreateMedicineType;
use App\Filament\Resources\MedicineTypes\Pages\EditMedicineType;
use App\Filament\Resources\MedicineTypes\Pages\ListMedicineTypes;
use App\Filament\Resources\MedicineTypes\Schemas\MedicineTypeForm;
use App\Filament\Resources\MedicineTypes\Tables\MedicineTypesTable;
use App\Models\MedicineType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MedicineTypeResource extends Resource
{
    protected static ?string $model = MedicineType::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return MedicineTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MedicineTypesTable::configure($table);
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
            'index' => ListMedicineTypes::route('/'),
            'create' => CreateMedicineType::route('/create'),
            'edit' => EditMedicineType::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 8;

    public static function getNavigationGroup(): ?string
    {
        return 'System & Configuration';
    }
}
