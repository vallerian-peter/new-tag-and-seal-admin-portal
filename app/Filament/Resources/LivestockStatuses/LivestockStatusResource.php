<?php

namespace App\Filament\Resources\LivestockStatuses;

use App\Filament\Resources\LivestockStatuses\Pages\CreateLivestockStatus;
use App\Filament\Resources\LivestockStatuses\Pages\EditLivestockStatus;
use App\Filament\Resources\LivestockStatuses\Pages\ListLivestockStatuses;
use App\Filament\Resources\LivestockStatuses\Pages\ViewLivestockStatus;
use App\Filament\Resources\LivestockStatuses\Schemas\LivestockStatusForm;
use App\Filament\Resources\LivestockStatuses\Tables\LivestockStatusesTable;
use App\Models\LivestockStatus;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LivestockStatusResource extends Resource
{
    protected static ?string $model = LivestockStatus::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-flag';

    public static function form(Schema $schema): Schema
    {
        return LivestockStatusForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LivestockStatusesTable::configure($table);
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
            'index' => ListLivestockStatuses::route('/'),
            'create' => CreateLivestockStatus::route('/create'),
            'view' => ViewLivestockStatus::route('/{record}'),
            'edit' => EditLivestockStatus::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 4;

    public static function getNavigationGroup(): ?string
    {
        return 'Livestock & Data';
    }
}
