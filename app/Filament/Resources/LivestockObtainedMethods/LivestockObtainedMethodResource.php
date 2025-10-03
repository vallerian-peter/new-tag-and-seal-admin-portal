<?php

namespace App\Filament\Resources\LivestockObtainedMethods;

use App\Filament\Resources\LivestockObtainedMethods\Pages\CreateLivestockObtainedMethod;
use App\Filament\Resources\LivestockObtainedMethods\Pages\EditLivestockObtainedMethod;
use App\Filament\Resources\LivestockObtainedMethods\Pages\ListLivestockObtainedMethods;
use App\Filament\Resources\LivestockObtainedMethods\Pages\ViewLivestockObtainedMethod;
use App\Filament\Resources\LivestockObtainedMethods\Schemas\LivestockObtainedMethodForm;
use App\Filament\Resources\LivestockObtainedMethods\Tables\LivestockObtainedMethodsTable;
use App\Models\LivestockObtainedMethod;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LivestockObtainedMethodResource extends Resource
{
    protected static ?string $model = LivestockObtainedMethod::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-arrow-down-tray';

    public static function form(Schema $schema): Schema
    {
        return LivestockObtainedMethodForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LivestockObtainedMethodsTable::configure($table);
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
            'index' => ListLivestockObtainedMethods::route('/'),
            'create' => CreateLivestockObtainedMethod::route('/create'),
            'view' => ViewLivestockObtainedMethod::route('/{record}'),
            'edit' => EditLivestockObtainedMethod::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 5;

    public static function getNavigationGroup(): ?string
    {
        return 'Livestock & Data';
    }
}
