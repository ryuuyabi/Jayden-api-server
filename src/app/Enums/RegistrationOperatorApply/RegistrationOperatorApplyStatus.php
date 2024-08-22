<?php

namespace App\Enums\RegistrationOperatorApply;

enum RegistrationOperatorApplyStatus: int
{
    case UNREGISTERED = 1;
    case REGISTRATION = 2;
    case REJECTION = 3;

    public function description(): string
    {
        return match ($this) {
            self::UNREGISTERED => '未登録',
            self::REGISTRATION => '登録',
            self::REJECTION => '拒否',
        };
    }
}
