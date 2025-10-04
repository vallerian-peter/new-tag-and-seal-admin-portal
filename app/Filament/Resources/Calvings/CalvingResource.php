<?php

namespace App\Filament\Resources\Calvings;

use App\Models\Calving;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use BackedEnum;
use App\Filament\Resources\Calvings\Schemas\CalvingForm;
use App\Filament\Resources\Calvings\Tables\CalvingsTable;
use App\Filament\Resources\Calvings\Pages\ListCalvings;
use App\Filament\Resources\Calvings\Pages\CreateCalving;
use App\Filament\Resources\Calvings\Pages\EditCalving;
use App\Filament\Resources\Calvings\Pages\ViewCalving;

class CalvingResource extends Resource
{
    protected static ?string $model = Calving::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cake';

    protected static ?string $navigationLabel = 'Calvings';

    protected static ?string $modelLabel = 'Calving';

    protected static ?string $pluralModelLabel = 'Calvings';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return 'Logs & Events';
    }

    public static function form(Schema $schema): Schema
    {
        return CalvingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CalvingsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCalvings::route('/'),
            'create' => CreateCalving::route('/create'),
            'view' => ViewCalving::route('/{record}'),
            'edit' => EditCalving::route('/{record}/edit'),
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
