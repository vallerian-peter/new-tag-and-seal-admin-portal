<?php

namespace App\Filament\Resources\Feedings\Pages;

use App\Filament\Resources\Feedings\FeedingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListFeedings extends ListRecords
{
    protected static string $resource = FeedingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
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
              ->orWhere('amount', 'like', "%{$search}%")
              ->orWhere('remarks', 'like', "%{$search}%")
              ->orWhereHas('livestock', function ($subQuery) use ($search) {
                  $subQuery->where('name', 'like', "%{$search}%")
                           ->orWhereHas('farmLivestocks.farm.farmOwners.farmer', function ($ownerQuery) use ($search) {
                               $ownerQuery->whereRaw("CONCAT(first_name, ' ', surname) LIKE ?", ["%{$search}%"]);
                           });
              })
              ->orWhereHas('farm', function ($subQuery) use ($search) {
                  $subQuery->where('name', 'like', "%{$search}%");
              })
              ->orWhereHas('feedingType', function ($subQuery) use ($search) {
                  $subQuery->where('name', 'like', "%{$search}%");
              });
        });
    }
}
