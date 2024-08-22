<?php

namespace App\Enums\User;

enum UserStatus: int
{
    case ACTIVITY = 1;
    case STOP = 2;
    case BAN = 3;

    public function description(): string
    {
        return match ($this) {
            self::ACTIVITY => '活動中',
            self::STOP => '活動停止中',
            self::BAN => '活動禁止中',
        };
    }
}
