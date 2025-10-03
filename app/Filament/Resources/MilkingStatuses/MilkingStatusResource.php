<?php

namespace App\Filament\Resources\MilkingStatuses;

use App\Filament\Resources\MilkingStatuses\Pages\CreateMilkingStatus;
use App\Filament\Resources\MilkingStatuses\Pages\EditMilkingStatus;
use App\Filament\Resources\MilkingStatuses\Pages\ListMilkingStatuses;
use App\Filament\Resources\MilkingStatuses\Schemas\MilkingStatusForm;
use App\Filament\Resources\MilkingStatuses\Tables\MilkingStatusesTable;
use App\Models\MilkingStatus;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MilkingStatusResource extends Resource
{
    protected static ?string $model = MilkingStatus::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-flag';

    public static function form(Schema $schema): Schema
    {
        return MilkingStatusForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MilkingStatusesTable::configure($table);
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
            'index' => ListMilkingStatuses::route('/'),
            'create' => CreateMilkingStatus::route('/create'),
            'edit' => EditMilkingStatus::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 14;

    public static function getNavigationGroup(): ?string
    {
        return 'Livestock & Data';
    }
}
