<?php

namespace App\Filament\Resources\Livestocks;

use App\Filament\Resources\Livestocks\Pages\CreateLivestock;
use App\Filament\Resources\Livestocks\Pages\EditLivestock;
use App\Filament\Resources\Livestocks\Pages\ListLivestocks;
use App\Filament\Resources\Livestocks\Pages\ViewLivestock;
use App\Filament\Resources\Livestocks\Schemas\LivestockForm;
use App\Filament\Resources\Livestocks\Tables\LivestocksTable;
use App\Models\Livestock;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LivestockResource extends Resource
{
    protected static ?string $model = Livestock::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cube';

    public static function form(Schema $schema): Schema
    {
        return LivestockForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LivestocksTable::configure($table);
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
            'index' => ListLivestocks::route('/'),
            'create' => CreateLivestock::route('/create'),
            'view' => ViewLivestock::route('/{record}'),
            'edit' => EditLivestock::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 6;

    public static function getNavigationGroup(): ?string
    {
        return 'Livestock & Data';
    }
}
