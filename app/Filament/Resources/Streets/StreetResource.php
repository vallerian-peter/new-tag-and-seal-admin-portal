<?php

namespace App\Filament\Resources\Streets;

use App\Models\Street;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use BackedEnum;
use App\Filament\Resources\Streets\Schemas\StreetForm;
use App\Filament\Resources\Streets\Tables\StreetsTable;
use App\Filament\Resources\Streets\Pages\ListStreets;
use App\Filament\Resources\Streets\Pages\CreateStreet;
use App\Filament\Resources\Streets\Pages\EditStreet;

class StreetResource extends Resource
{
    protected static ?string $model = Street::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $navigationLabel = 'Streets';

    protected static ?string $modelLabel = 'Street';

    protected static ?string $pluralModelLabel = 'Streets';

    protected static ?int $navigationSort = 6;

    public static function getNavigationGroup(): ?string
    {
        return 'Geographical';
    }

    public static function form(Schema $schema): Schema
    {
        return StreetForm::configure($schema, false);
    }

    public static function editForm(Schema $schema): Schema
    {
        return StreetForm::configure($schema, true);
    }

    public static function table(Table $table): Table
    {
        return StreetsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStreets::route('/'),
            'create' => CreateStreet::route('/create'),
            'edit' => EditStreet::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'warning';
    }
}
