<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ProjectStatus: int implements HasLabel, HasColor
{
    case Pending = 0;
    case InProgress = 1;
    case Completed = 2;

    public function getLabel(): string
    {
        return match ($this) {
            ProjectStatus::Pending => 'Pending',
            ProjectStatus::InProgress => 'In Progress',
            ProjectStatus::Completed => 'Completed',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            ProjectStatus::Pending => 'danger',
            ProjectStatus::InProgress => 'primary',
            ProjectStatus::Completed => 'success',
        };
    }
}
