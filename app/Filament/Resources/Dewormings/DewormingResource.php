<?php

namespace App\Filament\Resources\Dewormings;

use App\Models\Deworming;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use BackedEnum;
use App\Filament\Resources\Dewormings\Schemas\DewormingForm;
use App\Filament\Resources\Dewormings\Tables\DewormingsTable;
use App\Filament\Resources\Dewormings\Pages\ListDewormings;
use App\Filament\Resources\Dewormings\Pages\CreateDeworming;
use App\Filament\Resources\Dewormings\Pages\EditDeworming;
use App\Filament\Resources\Dewormings\Pages\ViewDeworming;

class DewormingResource extends Resource
{
    protected static ?string $model = Deworming::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-heart';

    protected static ?string $navigationLabel = 'Deworming Logs';

    protected static ?string $modelLabel = 'Deworming Log';

    protected static ?string $pluralModelLabel = 'Deworming Logs';

    protected static ?int $navigationSort = 7;

    public static function getNavigationGroup(): ?string
    {
        return 'Logs & Events';
    }

    public static function form(Schema $schema): Schema
    {
        return DewormingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DewormingsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDewormings::route('/'),
            'create' => CreateDeworming::route('/create'),
            'view' => ViewDeworming::route('/{record}'),
            'edit' => EditDeworming::route('/{record}/edit'),
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
