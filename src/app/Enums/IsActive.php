<?php

namespace App\Enums;

enum IsActive: int
{
    case OFF = 0;
    case ON = 1;

    public function description(): string
    {
        return match ($this) {
            self::OFF => '活動不可',
            self::ON => '活動中',
        };
    }
}
