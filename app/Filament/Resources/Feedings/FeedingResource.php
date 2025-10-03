<?php

namespace App\Filament\Resources\Feedings;

use App\Filament\Resources\Feedings\Pages\CreateFeeding;
use App\Filament\Resources\Feedings\Pages\EditFeeding;
use App\Filament\Resources\Feedings\Pages\ListFeedings;
use App\Filament\Resources\Feedings\Schemas\FeedingForm;
use App\Filament\Resources\Feedings\Tables\FeedingsTable;
use App\Models\Feeding;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FeedingResource extends Resource
{
    protected static ?string $model = Feeding::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Schema $schema): Schema
    {
        return FeedingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeedingsTable::configure($table);
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
            'index' => ListFeedings::route('/'),
            'create' => CreateFeeding::route('/create'),
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

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): ?string
    {
        return 'Logs & Events';
    }
}
