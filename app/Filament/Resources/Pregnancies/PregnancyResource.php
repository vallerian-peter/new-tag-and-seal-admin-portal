<?php

namespace App\Filament\Resources\Pregnancies;

use App\Models\Pregnancy;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use BackedEnum;
use App\Filament\Resources\Pregnancies\Schemas\PregnancyForm;
use App\Filament\Resources\Pregnancies\Tables\PregnanciesTable;
use App\Filament\Resources\Pregnancies\Pages\ListPregnancies;
use App\Filament\Resources\Pregnancies\Pages\CreatePregnancy;
use App\Filament\Resources\Pregnancies\Pages\EditPregnancy;
use App\Filament\Resources\Pregnancies\Pages\ViewPregnancy;

class PregnancyResource extends Resource
{
    protected static ?string $model = Pregnancy::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-heart';

    protected static ?string $navigationLabel = 'Pregnancies';

    protected static ?string $modelLabel = 'Pregnancy';

    protected static ?string $pluralModelLabel = 'Pregnancies';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return 'Logs & Events';
    }

    public static function form(Schema $schema): Schema
    {
        return PregnancyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PregnanciesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPregnancies::route('/'),
            'create' => CreatePregnancy::route('/create'),
            'view' => ViewPregnancy::route('/{record}'),
            'edit' => EditPregnancy::route('/{record}/edit'),
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
