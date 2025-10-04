<?php

namespace App\Filament\Resources\Feedings;

use App\Models\Feeding;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use BackedEnum;
use App\Filament\Resources\Feedings\Schemas\FeedingForm;
use App\Filament\Resources\Feedings\Tables\FeedingsTable;
use App\Filament\Resources\Feedings\Pages\ListFeedings;
use App\Filament\Resources\Feedings\Pages\CreateFeeding;
use App\Filament\Resources\Feedings\Pages\EditFeeding;
use App\Filament\Resources\Feedings\Pages\ViewFeeding;

class FeedingResource extends Resource
{
    protected static ?string $model = Feeding::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'Feedings';

    protected static ?string $modelLabel = 'Feeding';

    protected static ?string $pluralModelLabel = 'Feedings';

    protected static ?int $navigationSort = 10;

    public static function getNavigationGroup(): ?string
    {
        return 'Logs & Events';
    }

    public static function form(Schema $schema): Schema
    {
        return FeedingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeedingsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFeedings::route('/'),
            'create' => CreateFeeding::route('/create'),
            'view' => ViewFeeding::route('/{record}'),
            'edit' => EditFeeding::route('/{record}/edit'),
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
