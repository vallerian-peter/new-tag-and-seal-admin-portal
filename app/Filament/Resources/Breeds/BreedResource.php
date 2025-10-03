<?php

namespace App\Filament\Resources\Breeds;

use App\Filament\Resources\Breeds\Pages\CreateBreed;
use App\Filament\Resources\Breeds\Pages\EditBreed;
use App\Filament\Resources\Breeds\Pages\ListBreeds;
use App\Filament\Resources\Breeds\Pages\ViewBreed;
use App\Filament\Resources\Breeds\Schemas\BreedForm;
use App\Filament\Resources\Breeds\Tables\BreedsTable;
use App\Models\Breed;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BreedResource extends Resource
{
    protected static ?string $model = Breed::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-tag';

    public static function form(Schema $schema): Schema
    {
        return BreedForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BreedsTable::configure($table);
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
            'index' => ListBreeds::route('/'),
            'create' => CreateBreed::route('/create'),
            'view' => ViewBreed::route('/{record}'),
            'edit' => EditBreed::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return 'Livestock & Data';
    }
}
