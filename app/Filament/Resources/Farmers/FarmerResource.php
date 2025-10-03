<?php

namespace App\Filament\Resources\Farmers;

use App\Filament\Resources\Farmers\Pages\CreateFarmer;
use App\Filament\Resources\Farmers\Pages\EditFarmer;
use App\Filament\Resources\Farmers\Pages\ListFarmers;
use App\Filament\Resources\Farmers\Pages\ViewFarmer;
use App\Filament\Resources\Farmers\Schemas\FarmerForm;
use App\Filament\Resources\Farmers\Tables\FarmersTable;
use App\Models\Farmer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FarmerResource extends Resource
{
    protected static ?string $model = Farmer::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 3;

    public static function getNavigationGroup(): ?string
    {
        return 'People & Users';
    }

    public static function form(Schema $schema): Schema
    {
        return FarmerForm::configure($schema, false); // Default to create mode
    }

    public static function editForm(Schema $schema): Schema
    {
        return FarmerForm::configure($schema, true); // Edit mode
    }

    public static function table(Table $table): Table
    {
        return FarmersTable::configure($table);
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
            'index' => ListFarmers::route('/'),
            'create' => CreateFarmer::route('/create'),
            'view' => ViewFarmer::route('/{record}'),
            'edit' => EditFarmer::route('/{record}/edit'),
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
