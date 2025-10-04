<?php

namespace App\Filament\Resources\Disposals;

use App\Models\Disposal;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use BackedEnum;
use App\Filament\Resources\Disposals\Schemas\DisposalForm;
use App\Filament\Resources\Disposals\Tables\DisposalsTable;
use App\Filament\Resources\Disposals\Pages\ListDisposals;
use App\Filament\Resources\Disposals\Pages\CreateDisposal;
use App\Filament\Resources\Disposals\Pages\EditDisposal;
use App\Filament\Resources\Disposals\Pages\ViewDisposal;

class DisposalResource extends Resource
{
    protected static ?string $model = Disposal::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-trash';

    protected static ?string $navigationLabel = 'Disposals';

    protected static ?string $modelLabel = 'Disposal';

    protected static ?string $pluralModelLabel = 'Disposals';

    protected static ?int $navigationSort = 3;

    public static function getNavigationGroup(): ?string
    {
        return 'Logs & Events';
    }

    public static function form(Schema $schema): Schema
    {
        return DisposalForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DisposalsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDisposals::route('/'),
            'create' => CreateDisposal::route('/create'),
            'view' => ViewDisposal::route('/{record}'),
            'edit' => EditDisposal::route('/{record}/edit'),
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
