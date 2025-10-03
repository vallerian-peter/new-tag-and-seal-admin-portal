<?php

namespace App\Filament\Resources\IdentityCardTypes;

use App\Models\IdentityCardType;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use BackedEnum;
use App\Filament\Resources\IdentityCardTypes\Schemas\IdentityCardTypeForm;
use App\Filament\Resources\IdentityCardTypes\Tables\IdentityCardTypesTable;
use App\Filament\Resources\IdentityCardTypes\Pages\ListIdentityCardTypes;
use App\Filament\Resources\IdentityCardTypes\Pages\CreateIdentityCardType;
use App\Filament\Resources\IdentityCardTypes\Pages\EditIdentityCardType;

class IdentityCardTypeResource extends Resource
{
    protected static ?string $model = IdentityCardType::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationLabel = 'ID Card Types';

    protected static ?string $modelLabel = 'ID Card Type';

    protected static ?string $pluralModelLabel = 'ID Card Types';

    protected static ?int $navigationSort = 3;

    public static function getNavigationGroup(): ?string
    {
        return 'System & Configuration';
    }

    public static function form(Schema $schema): Schema
    {
        return IdentityCardTypeForm::configure($schema, false);
    }

    public static function editForm(Schema $schema): Schema
    {
        return IdentityCardTypeForm::configure($schema, true);
    }

    public static function table(Table $table): Table
    {
        return IdentityCardTypesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIdentityCardTypes::route('/'),
            'create' => CreateIdentityCardType::route('/create'),
            'edit' => EditIdentityCardType::route('/{record}/edit'),
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
