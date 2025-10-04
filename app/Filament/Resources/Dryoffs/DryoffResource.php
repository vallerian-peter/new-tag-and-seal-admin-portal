<?php

namespace App\Filament\Resources\Dryoffs;

use App\Models\Dryoff;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use BackedEnum;
use App\Filament\Resources\Dryoffs\Schemas\DryoffForm;
use App\Filament\Resources\Dryoffs\Tables\DryoffsTable;
use App\Filament\Resources\Dryoffs\Pages\ListDryoffs;
use App\Filament\Resources\Dryoffs\Pages\CreateDryoff;
use App\Filament\Resources\Dryoffs\Pages\EditDryoff;
use App\Filament\Resources\Dryoffs\Pages\ViewDryoff;

class DryoffResource extends Resource
{
    protected static ?string $model = Dryoff::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-pause';

    protected static ?string $navigationLabel = 'Dryoffs';

    protected static ?string $modelLabel = 'Dryoff';

    protected static ?string $pluralModelLabel = 'Dryoffs';

    protected static ?int $navigationSort = 4;

    public static function getNavigationGroup(): ?string
    {
        return 'Logs & Events';
    }

    public static function form(Schema $schema): Schema
    {
        return DryoffForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DryoffsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDryoffs::route('/'),
            'create' => CreateDryoff::route('/create'),
            'view' => ViewDryoff::route('/{record}'),
            'edit' => EditDryoff::route('/{record}/edit'),
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
