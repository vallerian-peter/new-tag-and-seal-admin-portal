<?php

namespace App\Filament\Resources\MilkingMethods;

use App\Filament\Resources\MilkingMethods\Pages\CreateMilkingMethod;
use App\Filament\Resources\MilkingMethods\Pages\EditMilkingMethod;
use App\Filament\Resources\MilkingMethods\Pages\ListMilkingMethods;
use App\Filament\Resources\MilkingMethods\Schemas\MilkingMethodForm;
use App\Filament\Resources\MilkingMethods\Tables\MilkingMethodsTable;
use App\Models\MilkingMethod;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MilkingMethodResource extends Resource
{
    protected static ?string $model = MilkingMethod::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-wrench-screwdriver';

    public static function form(Schema $schema): Schema
    {
        return MilkingMethodForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MilkingMethodsTable::configure($table);
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
            'index' => ListMilkingMethods::route('/'),
            'create' => CreateMilkingMethod::route('/create'),
            'edit' => EditMilkingMethod::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 15;

    public static function getNavigationGroup(): ?string
    {
        return 'Livestock & Data';
    }
}
