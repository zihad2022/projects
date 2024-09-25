<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Enums\ProjectStatus;
use App\Filament\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListProjects extends ListRecords
{
    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All'),

            'pending' => Tab::make('Pending')
                ->icon('heroicon-o-clock')
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('status', ProjectStatus::Pending->value);
                }),

            'in_progress' => Tab::make('In Progress')
                ->icon('heroicon-o-play')
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('status', ProjectStatus::InProgress->value);
                }),

            'completed' => Tab::make('Completed')
                ->icon('heroicon-o-check-circle')
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('status', ProjectStatus::Completed->value);
                }),
        ];
    }
}
