<?php

namespace App\Filament\Resources\Pregnancies\Pages;

use App\Filament\Resources\Pregnancies\PregnancyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPregnancies extends ListRecords
{
    protected static string $resource = PregnancyResource::class;

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
              ->orWhere('remarks', 'like', "%{$search}%")
              ->orWhereHas('livestock', function ($subQuery) use ($search) {
                  $subQuery->where('name', 'like', "%{$search}%");
              })
              ->orWhereHas('farm', function ($subQuery) use ($search) {
                  $subQuery->where('name', 'like', "%{$search}%");
              })
              ->orWhereHas('testResult', function ($subQuery) use ($search) {
                  $subQuery->where('name', 'like', "%{$search}%");
              });
        });
    }
}
