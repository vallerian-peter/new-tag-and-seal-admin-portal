<?php

namespace App\Filament\Resources\Milkings;

use App\Filament\Resources\Milkings\Pages\CreateMilking;
use App\Filament\Resources\Milkings\Pages\EditMilking;
use App\Filament\Resources\Milkings\Pages\ListMilkings;
use App\Filament\Resources\Milkings\Schemas\MilkingForm;
use App\Filament\Resources\Milkings\Tables\MilkingsTable;
use App\Models\Milking;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MilkingResource extends Resource
{
    protected static ?string $model = Milking::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-beaker';

    public static function form(Schema $schema): Schema
    {
        return MilkingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MilkingsTable::configure($table);
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
            'index' => ListMilkings::route('/'),
            'create' => CreateMilking::route('/create'),
            'edit' => EditMilking::route('/{record}/edit'),
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
        return 'Logs & Events';
    }
}
