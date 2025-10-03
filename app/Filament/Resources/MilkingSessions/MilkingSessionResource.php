<?php

namespace App\Filament\Resources\MilkingSessions;

use App\Filament\Resources\MilkingSessions\Pages\CreateMilkingSession;
use App\Filament\Resources\MilkingSessions\Pages\EditMilkingSession;
use App\Filament\Resources\MilkingSessions\Pages\ListMilkingSessions;
use App\Filament\Resources\MilkingSessions\Schemas\MilkingSessionForm;
use App\Filament\Resources\MilkingSessions\Tables\MilkingSessionsTable;
use App\Models\MilkingSession;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MilkingSessionResource extends Resource
{
    protected static ?string $model = MilkingSession::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clock';

    public static function form(Schema $schema): Schema
    {
        return MilkingSessionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MilkingSessionsTable::configure($table);
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
            'index' => ListMilkingSessions::route('/'),
            'create' => CreateMilkingSession::route('/create'),
            'edit' => EditMilkingSession::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 13;

    public static function getNavigationGroup(): ?string
    {
        return 'Livestock & Data';
    }
}
