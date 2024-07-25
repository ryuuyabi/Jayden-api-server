<?php

namespace App\Enums;

enum Gender: int
{
    case MALE = 1;
    case FEMALE = 2;

    public function description(): string
    {
        return match ($this) {
            self::MALE => '男性',
            self::FEMALE => '女性',
        };
    }
}
