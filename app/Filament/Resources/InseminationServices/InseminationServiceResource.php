<?php

namespace App\Filament\Resources\InseminationServices;

use App\Filament\Resources\InseminationServices\Pages\CreateInseminationService;
use App\Filament\Resources\InseminationServices\Pages\EditInseminationService;
use App\Filament\Resources\InseminationServices\Pages\ListInseminationServices;
use App\Filament\Resources\InseminationServices\Schemas\InseminationServiceForm;
use App\Filament\Resources\InseminationServices\Tables\InseminationServicesTable;
use App\Models\InseminationService;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InseminationServiceResource extends Resource
{
    protected static ?string $model = InseminationService::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-wrench-screwdriver';

    public static function form(Schema $schema): Schema
    {
        return InseminationServiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InseminationServicesTable::configure($table);
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
            'index' => ListInseminationServices::route('/'),
            'create' => CreateInseminationService::route('/create'),
            'edit' => EditInseminationService::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 11;

    public static function getNavigationGroup(): ?string
    {
        return 'Livestock & Data';
    }
}
