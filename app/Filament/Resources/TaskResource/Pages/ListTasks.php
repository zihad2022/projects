<?php

namespace App\Filament\Resources\TaskResource\Pages;

use App\Enums\TaskStatus;
use App\Filament\Resources\TaskResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListTasks extends ListRecords
{
    protected static string $resource = TaskResource::class;

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
                    return $query->where('status', TaskStatus::Pending->value);
                }),

            'in_progress' => Tab::make('In Progress')
                ->icon('heroicon-o-play')
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('status', TaskStatus::InProgress->value);
                }),

            'completed' => Tab::make('Completed')
                ->icon('heroicon-o-check-circle')
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('status', TaskStatus::Completed->value);
                }),
        ];
    }
}
