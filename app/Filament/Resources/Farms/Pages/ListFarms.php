<?php

namespace App\Filament\Resources\Farms\Pages;

use App\Models\Farm;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Farms\FarmResource;
use Illuminate\Database\Eloquent\Builder;

class ListFarms extends ListRecords
{
    protected static string $resource = FarmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function applySearchToTableQuery(Builder $query): Builder
    {
        $search = $this->getTableSearch();

        if (empty($search)) {
            return $query;
        }

        return $query->where(function ($q) use ($search) {
            $q->where('reference_no', 'like', "%{$search}%")
              ->orWhere('name', 'like', "%{$search}%")
              ->orWhereHas('farmOwners.farmer', function ($subQuery) use ($search) {
                  $subQuery->whereRaw("CONCAT(first_name, ' ', surname) LIKE ?", ["%{$search}%"]);
              });
        });
    }
}
