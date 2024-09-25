<?php

namespace App\Filament\Widgets;

use App\Enums\ProjectStatus;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class ProjectOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Projects', Project::where('user_id', Auth::id())->count())->description('All projects'),
            Stat::make('Pending Projects', Project::where('user_id', Auth::id())->where('status', ProjectStatus::Pending->value)->count())->description('All pnending projects'),
            Stat::make('In Progress Projects', Project::where('user_id', Auth::id())->where('status', ProjectStatus::InProgress->value)->count())->description('All in progress projects'),
            Stat::make('Completed Projects', Project::where('user_id', Auth::id())->where('status', ProjectStatus::Completed->value)->count())->description('All completed projects'),

            Stat::make('Total Budget', Project::where('user_id', Auth::id())->sum('budget').' TK')->description('All projects budget'),
            Stat::make('Total Earned', Project::where('user_id', Auth::id())->sum('advanced_money').' TK')->description('All projects earned money'),
            Stat::make('Total Due', Project::where('user_id', Auth::id())->sum('due_money').' TK')->description('All projects due money'),
        ];
    }
}
