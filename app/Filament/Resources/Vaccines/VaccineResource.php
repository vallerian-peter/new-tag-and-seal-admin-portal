<?php

namespace App\Filament\Resources\Vaccines;

use App\Filament\Resources\Vaccines\Pages\CreateVaccine;
use App\Filament\Resources\Vaccines\Pages\EditVaccine;
use App\Filament\Resources\Vaccines\Pages\ListVaccines;
use App\Filament\Resources\Vaccines\Pages\ViewVaccine;
use App\Filament\Resources\Vaccines\Schemas\VaccineForm;
use App\Filament\Resources\Vaccines\Tables\VaccinesTable;
use App\Models\Vaccine;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VaccineResource extends Resource
{
    protected static ?string $model = Vaccine::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-shield-check';

    public static function form(Schema $schema): Schema
    {
        // Determine if this is an edit operation by checking the current route
        $isEdit = request()->routeIs('*.edit') || request()->routeIs('*.update');
        return VaccineForm::configure($schema, $isEdit);
    }

    public static function table(Table $table): Table
    {
        return VaccinesTable::configure($table);
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
            'index' => ListVaccines::route('/'),
            'create' => CreateVaccine::route('/create'),
            'view' => ViewVaccine::route('/{record}'),
            'edit' => EditVaccine::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 7;

    public static function getNavigationGroup(): ?string
    {
        return 'Livestock & Data';
    }
}
