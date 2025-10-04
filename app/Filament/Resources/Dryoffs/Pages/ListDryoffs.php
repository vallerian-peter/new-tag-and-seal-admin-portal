<?php

namespace App\Filament\Resources\Dryoffs\Pages;

use App\Filament\Resources\Dryoffs\DryoffResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListDryoffs extends ListRecords
{
    protected static string $resource = DryoffResource::class;

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
              ->orWhere('serial', 'like', "%{$search}%")
              ->orWhereHas('livestock', function ($subQuery) use ($search) {
                  $subQuery->where('name', 'like', "%{$search}%");
              })
              ->orWhereHas('farm', function ($subQuery) use ($search) {
                  $subQuery->where('name', 'like', "%{$search}%");
              });
        });
    }
}
