<?php

namespace App\Filament\Resources\VaccineSchedules;

use App\Filament\Resources\VaccineSchedules\Pages\CreateVaccineSchedule;
use App\Filament\Resources\VaccineSchedules\Pages\EditVaccineSchedule;
use App\Filament\Resources\VaccineSchedules\Pages\ListVaccineSchedules;
use App\Filament\Resources\VaccineSchedules\Schemas\VaccineScheduleForm;
use App\Filament\Resources\VaccineSchedules\Tables\VaccineSchedulesTable;
use App\Models\VaccineSchedule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VaccineScheduleResource extends Resource
{
    protected static ?string $model = VaccineSchedule::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-calendar';

    public static function form(Schema $schema): Schema
    {
        return VaccineScheduleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VaccineSchedulesTable::configure($table);
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
            'index' => ListVaccineSchedules::route('/'),
            'create' => CreateVaccineSchedule::route('/create'),
            'edit' => EditVaccineSchedule::route('/{record}/edit'),
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

    protected static ?int $navigationSort = 9;

    public static function getNavigationGroup(): ?string
    {
        return 'Livestock & Data';
    }
}
