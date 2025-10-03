<?php

namespace App\Filament\Resources\ExtensionOfficers;

use App\Filament\Resources\ExtensionOfficers\Pages\CreateExtensionOfficer;
use App\Filament\Resources\ExtensionOfficers\Pages\EditExtensionOfficer;
use App\Filament\Resources\ExtensionOfficers\Pages\ListExtensionOfficers;
use App\Filament\Resources\ExtensionOfficers\Schemas\ExtensionOfficerForm;
use App\Filament\Resources\ExtensionOfficers\Tables\ExtensionOfficersTable;
use App\Models\ExtensionOfficer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ExtensionOfficerResource extends Resource
{
    protected static ?string $model = ExtensionOfficer::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    public static function form(Schema $schema): Schema
    {
        return ExtensionOfficerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExtensionOfficersTable::configure($table);
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
            'index' => ListExtensionOfficers::route('/'),
            'create' => CreateExtensionOfficer::route('/create'),
            'edit' => EditExtensionOfficer::route('/{record}/edit'),
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
        return 'People & Users';
    }
}
