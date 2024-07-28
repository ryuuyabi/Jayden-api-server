<?php

namespace App\Enums\RegistrationOperatorApply;

enum RegistrationOperatorApplyStatus: int
{
    case UNREGISTERED = 1;
    case REGISTRATION = 2;
    case REJECTION = 3;
}
