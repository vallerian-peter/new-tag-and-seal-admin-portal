<?php

namespace App\Filament\Resources\LivestockTypes;

use App\Filament\Resources\LivestockTypes\Pages\CreateLivestockType;
use App\Filament\Resources\LivestockTypes\Pages\EditLivestockType;
use App\Filament\Resources\LivestockTypes\Pages\ListLivestockTypes;
use App\Filament\Resources\LivestockTypes\Pages\ViewLivestockType;
use App\Filament\Resources\LivestockTypes\Schemas\LivestockTypeForm;
use App\Filament\Resources\LivestockTypes\Tables\LivestockTypesTable;
use App\Models\LivestockType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LivestockTypeResource extends Resource
{
    protected static ?string $model = LivestockType::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return LivestockTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LivestockTypesTable::configure($table);
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
            'index' => ListLivestockTypes::route('/'),
            'create' => CreateLivestockType::route('/create'),
            'view' => ViewLivestockType::route('/{record}'),
            'edit' => EditLivestockType::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return 'Livestock & Data';
    }
}
