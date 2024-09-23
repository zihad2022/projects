<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum TaskStatus: int implements HasLabel, HasColor
{
    case Pending = 0;
    case InProgress = 1;
    case Completed = 2;

    public function getLabel(): string
    {
        return match ($this) {
            TaskStatus::Pending => 'Pending',
            TaskStatus::InProgress => 'In Progress',
            TaskStatus::Completed => 'Completed',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            TaskStatus::Pending => 'danger',
            TaskStatus::InProgress => 'primary',
            TaskStatus::Completed => 'success',
        };
    }
}
