<?php

namespace App\Enums\Account;

enum RegistrationStatus: int
{
    case UNREGISTERED = 1;
    case REGISTRATION = 2;
}
