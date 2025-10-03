<?php

namespace App\Filament\Resources\Farms;

use App\Models\Farm;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use BackedEnum;
use App\Filament\Resources\Farms\Schemas\FarmForm;
use App\Filament\Resources\Farms\Tables\FarmsTable;
use App\Filament\Resources\Farms\Pages\ListFarms;
use App\Filament\Resources\Farms\Pages\CreateFarm;
use App\Filament\Resources\Farms\Pages\EditFarm;
use App\Filament\Resources\Farms\Pages\ViewFarm;

class FarmResource extends Resource
{
    protected static ?string $model = Farm::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationLabel = 'Farms';

    protected static ?string $modelLabel = 'Farm';

    protected static ?string $pluralModelLabel = 'Farms';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return 'People & Users';
    }

    public static function form(Schema $schema): Schema
    {
        return FarmForm::configure($schema, false); // Default to create mode
    }

    public static function editForm(Schema $schema): Schema
    {
        return FarmForm::configure($schema, true); // Edit mode
    }

    public static function table(Table $table): Table
    {
        return FarmsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFarms::route('/'),
            'create' => CreateFarm::route('/create'),
            'view' => ViewFarm::route('/{record}'),
            'edit' => EditFarm::route('/{record}/edit'),
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
}

