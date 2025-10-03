<?php

namespace App\Filament\Resources\Vets;

use App\Filament\Resources\Vets\Pages\CreateVet;
use App\Filament\Resources\Vets\Pages\EditVet;
use App\Filament\Resources\Vets\Pages\ListVets;
use App\Filament\Resources\Vets\Schemas\VetForm;
use App\Filament\Resources\Vets\Tables\VetsTable;
use App\Models\Vet;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VetResource extends Resource
{
    protected static ?string $model = Vet::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-plus';

    public static function form(Schema $schema): Schema
    {
        return VetForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VetsTable::configure($table);
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
            'index' => ListVets::route('/'),
            'create' => CreateVet::route('/create'),
            'edit' => EditVet::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 4;

    public static function getNavigationGroup(): ?string
    {
        return 'People & Users';
    }
}
