<?php

namespace App\Filament\Resources\Villages;

use App\Models\Village;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use BackedEnum;
use App\Filament\Resources\Villages\Schemas\VillageForm;
use App\Filament\Resources\Villages\Tables\VillagesTable;
use App\Filament\Resources\Villages\Pages\ListVillages;
use App\Filament\Resources\Villages\Pages\CreateVillage;
use App\Filament\Resources\Villages\Pages\EditVillage;

class VillageResource extends Resource
{
    protected static ?string $model = Village::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Villages';

    protected static ?string $modelLabel = 'Village';

    protected static ?string $pluralModelLabel = 'Villages';

    protected static ?int $navigationSort = 5;

    public static function getNavigationGroup(): ?string
    {
        return 'Geographical';
    }

    public static function form(Schema $schema): Schema
    {
        return VillageForm::configure($schema, false);
    }

    public static function editForm(Schema $schema): Schema
    {
        return VillageForm::configure($schema, true);
    }

    public static function table(Table $table): Table
    {
        return VillagesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVillages::route('/'),
            'create' => CreateVillage::route('/create'),
            'edit' => EditVillage::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'info';
    }
}
