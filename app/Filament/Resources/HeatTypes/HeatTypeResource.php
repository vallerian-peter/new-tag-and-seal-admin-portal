<?php

namespace App\Filament\Resources\HeatTypes;

use App\Filament\Resources\HeatTypes\Pages\CreateHeatType;
use App\Filament\Resources\HeatTypes\Pages\EditHeatType;
use App\Filament\Resources\HeatTypes\Pages\ListHeatTypes;
use App\Filament\Resources\HeatTypes\Schemas\HeatTypeForm;
use App\Filament\Resources\HeatTypes\Tables\HeatTypesTable;
use App\Models\HeatType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HeatTypeResource extends Resource
{
    protected static ?string $model = HeatType::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-fire';

    public static function form(Schema $schema): Schema
    {
        return HeatTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HeatTypesTable::configure($table);
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
            'index' => ListHeatTypes::route('/'),
            'create' => CreateHeatType::route('/create'),
            'edit' => EditHeatType::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 10;

    public static function getNavigationGroup(): ?string
    {
        return 'Livestock & Data';
    }
}
