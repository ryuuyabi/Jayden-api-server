<?php

namespace App\Enums\User;

use App\Concerns\EnumFunction;

enum UserRegistrationType: int
{
    use EnumFunction;

    case UNREGISTERED = 1;
    case REGISTRATION = 2;
}
