<?php

namespace App\Enums;

enum IsNotion: int
{
    case OFF = 0;
    case ON = 1;

    public function description(): string
    {
        return match ($this) {
            self::OFF => '通知不可',
            self::ON => '通知可能',
        };
    }
}
