<?php

namespace App\Filament\Resources\Calvings\Pages;

use App\Filament\Resources\Calvings\CalvingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListCalvings extends ListRecords
{
    protected static string $resource = CalvingResource::class;

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
              ->orWhere('remarks', 'like', "%{$search}%")
              ->orWhereHas('livestock', function ($subQuery) use ($search) {
                  $subQuery->where('name', 'like', "%{$search}%");
              })
              ->orWhereHas('farm', function ($subQuery) use ($search) {
                  $subQuery->where('name', 'like', "%{$search}%");
              })
              ->orWhereHas('calvingType', function ($subQuery) use ($search) {
                  $subQuery->where('name', 'like', "%{$search}%");
              })
              ->orWhereHas('calvingProblem', function ($subQuery) use ($search) {
                  $subQuery->where('name', 'like', "%{$search}%");
              })
              ->orWhereHas('reproductiveProblem', function ($subQuery) use ($search) {
                  $subQuery->where('name', 'like', "%{$search}%");
              });
        });
    }
}
