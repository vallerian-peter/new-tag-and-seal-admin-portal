<?php

namespace App\Filament\Resources\SemenStrawTypes;

use App\Filament\Resources\SemenStrawTypes\Pages\CreateSemenStrawType;
use App\Filament\Resources\SemenStrawTypes\Pages\EditSemenStrawType;
use App\Filament\Resources\SemenStrawTypes\Pages\ListSemenStrawTypes;
use App\Filament\Resources\SemenStrawTypes\Schemas\SemenStrawTypeForm;
use App\Filament\Resources\SemenStrawTypes\Tables\SemenStrawTypesTable;
use App\Models\SemenStrawType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SemenStrawTypeResource extends Resource
{
    protected static ?string $model = SemenStrawType::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cube';

    public static function form(Schema $schema): Schema
    {
        return SemenStrawTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SemenStrawTypesTable::configure($table);
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
            'index' => ListSemenStrawTypes::route('/'),
            'create' => CreateSemenStrawType::route('/create'),
            'edit' => EditSemenStrawType::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 12;

    public static function getNavigationGroup(): ?string
    {
        return 'Livestock & Data';
    }
}
