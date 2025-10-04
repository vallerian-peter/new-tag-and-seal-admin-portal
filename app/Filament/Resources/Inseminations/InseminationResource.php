<?php

namespace App\Filament\Resources\Inseminations;

use App\Models\Insemination;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use BackedEnum;
use App\Filament\Resources\Inseminations\Schemas\InseminationForm;
use App\Filament\Resources\Inseminations\Tables\InseminationsTable;
use App\Filament\Resources\Inseminations\Pages\ListInseminations;
use App\Filament\Resources\Inseminations\Pages\CreateInsemination;
use App\Filament\Resources\Inseminations\Pages\EditInsemination;
use App\Filament\Resources\Inseminations\Pages\ViewInsemination;

class InseminationResource extends Resource
{
    protected static ?string $model = Insemination::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-heart';

    protected static ?string $navigationLabel = 'Inseminations';

    protected static ?string $modelLabel = 'Insemination';

    protected static ?string $pluralModelLabel = 'Inseminations';

    protected static ?int $navigationSort = 7;

    public static function getNavigationGroup(): ?string
    {
        return 'Logs & Events';
    }

    public static function form(Schema $schema): Schema
    {
        return InseminationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InseminationsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInseminations::route('/'),
            'create' => CreateInsemination::route('/create'),
            'view' => ViewInsemination::route('/{record}'),
            'edit' => EditInsemination::route('/{record}/edit'),
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
