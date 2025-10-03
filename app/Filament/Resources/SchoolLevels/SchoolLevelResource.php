<?php

namespace App\Filament\Resources\SchoolLevels;

use App\Models\SchoolLevel;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use BackedEnum;
use App\Filament\Resources\SchoolLevels\Schemas\SchoolLevelForm;
use App\Filament\Resources\SchoolLevels\Tables\SchoolLevelsTable;
use App\Filament\Resources\SchoolLevels\Pages\ListSchoolLevels;
use App\Filament\Resources\SchoolLevels\Pages\CreateSchoolLevel;
use App\Filament\Resources\SchoolLevels\Pages\EditSchoolLevel;
use App\Filament\Resources\SchoolLevels\Pages\ViewSchoolLevel;

class SchoolLevelResource extends Resource
{
    protected static ?string $model = SchoolLevel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return 'System & Configuration';
    }

    protected static ?string $navigationLabel = 'School Levels';

    protected static ?string $modelLabel = 'School Level';

    protected static ?string $pluralModelLabel = 'School Levels';

    public static function form(Schema $schema): Schema
    {
        return SchoolLevelForm::configure($schema, false);
    }

    public static function editForm(Schema $schema): Schema
    {
        return SchoolLevelForm::configure($schema, true);
    }

    public static function table(Table $table): Table
    {
        return SchoolLevelsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSchoolLevels::route('/'),
            'create' => CreateSchoolLevel::route('/create'),
            'view' => ViewSchoolLevel::route('/{record}'),
            'edit' => EditSchoolLevel::route('/{record}/edit'),
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
