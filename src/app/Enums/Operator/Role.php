<?php

namespace App\Enums\Operator;

enum Role: int
{
    case MASTER_ADMIN = 1;
    case ADMIN = 2;
    case GENERAL = 3;
    case EXTERNAL = 4;

    public function description(): string
    {
        return match ($this) {
            self::MASTER_ADMIN => 'マスタ管理者',
            self::ADMIN => '通常管理者',
            self::GENERAL => '一般管理者',
            self::EXTERNAL => '外部管理者',
        };
    }
}
