<?php

namespace App\Filament\Resources\Weights;

use App\Models\Weight;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use BackedEnum;
use App\Filament\Resources\Weights\Schemas\WeightForm;
use App\Filament\Resources\Weights\Tables\WeightsTable;
use App\Filament\Resources\Weights\Pages\ListWeights;
use App\Filament\Resources\Weights\Pages\CreateWeight;
use App\Filament\Resources\Weights\Pages\EditWeight;
use App\Filament\Resources\Weights\Pages\ViewWeight;

class WeightResource extends Resource
{
    protected static ?string $model = Weight::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-scale';

    protected static ?string $navigationLabel = 'Weights';

    protected static ?string $modelLabel = 'Weight';

    protected static ?string $pluralModelLabel = 'Weights';

    protected static ?int $navigationSort = 5;

    public static function getNavigationGroup(): ?string
    {
        return 'Logs & Events';
    }

    public static function form(Schema $schema): Schema
    {
        return WeightForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WeightsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWeights::route('/'),
            'create' => CreateWeight::route('/create'),
            'view' => ViewWeight::route('/{record}'),
            'edit' => EditWeight::route('/{record}/edit'),
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
