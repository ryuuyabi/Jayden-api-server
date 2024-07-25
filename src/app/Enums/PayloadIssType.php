<?php

namespace App\Enums;

enum PayloadIssType: int
{
    case OPERATOR = 1;

    public function url(): string
    {
        return match ($this) {
            self::OPERATOR => url(''),
        };
    }
}
