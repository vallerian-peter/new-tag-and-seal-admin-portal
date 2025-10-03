<?php

namespace App\Filament\Resources\VaccineStatuses;

use App\Filament\Resources\VaccineStatuses\Pages\CreateVaccineStatus;
use App\Filament\Resources\VaccineStatuses\Pages\EditVaccineStatus;
use App\Filament\Resources\VaccineStatuses\Pages\ListVaccineStatuses;
use App\Filament\Resources\VaccineStatuses\Schemas\VaccineStatusForm;
use App\Filament\Resources\VaccineStatuses\Tables\VaccineStatusesTable;
use App\Models\VaccineStatus;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VaccineStatusResource extends Resource
{
    protected static ?string $model = VaccineStatus::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-flag';

    public static function form(Schema $schema): Schema
    {
        return VaccineStatusForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VaccineStatusesTable::configure($table);
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
            'index' => ListVaccineStatuses::route('/'),
            'create' => CreateVaccineStatus::route('/create'),
            'edit' => EditVaccineStatus::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 5;

    public static function getNavigationGroup(): ?string
    {
        return 'System & Configuration';
    }
}
