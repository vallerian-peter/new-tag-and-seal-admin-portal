<?php

namespace App\Filament\Resources\Wards;

use App\Models\Ward;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use BackedEnum;
use App\Filament\Resources\Wards\Schemas\WardForm;
use App\Filament\Resources\Wards\Tables\WardsTable;
use App\Filament\Resources\Wards\Pages\ListWards;
use App\Filament\Resources\Wards\Pages\CreateWard;
use App\Filament\Resources\Wards\Pages\EditWard;
use App\Filament\Resources\Wards\Pages\ViewWard;

class WardResource extends Resource
{
    protected static ?string $model = Ward::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationLabel = 'Wards';

    protected static ?string $modelLabel = 'Ward';

    protected static ?string $pluralModelLabel = 'Wards';

    protected static ?int $navigationSort = 4;

    public static function getNavigationGroup(): ?string
    {
        return 'Geographical';
    }

    public static function form(Schema $schema): Schema
    {
        return WardForm::configure($schema, false);
    }

    public static function editForm(Schema $schema): Schema
    {
        return WardForm::configure($schema, true);
    }

    public static function table(Table $table): Table
    {
        return WardsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWards::route('/'),
            'create' => CreateWard::route('/create'),
            'view' => ViewWard::route('/{record}'),
            'edit' => EditWard::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'secondary';
    }
}
