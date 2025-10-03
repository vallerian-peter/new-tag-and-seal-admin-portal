<?php

namespace App\Filament\Resources\Medications;

use App\Filament\Resources\Medications\Pages\CreateMedication;
use App\Filament\Resources\Medications\Pages\EditMedication;
use App\Filament\Resources\Medications\Pages\ListMedications;
use App\Filament\Resources\Medications\Schemas\MedicationForm;
use App\Filament\Resources\Medications\Tables\MedicationsTable;
use App\Models\Medication;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MedicationResource extends Resource
{
    protected static ?string $model = Medication::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-beaker';

    public static function form(Schema $schema): Schema
    {
        return MedicationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MedicationsTable::configure($table);
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
            'index' => ListMedications::route('/'),
            'create' => CreateMedication::route('/create'),
            'edit' => EditMedication::route('/{record}/edit'),
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
        return 'Logs & Events';
    }
}
