<?php

namespace App\Enums\Identifier;

enum IdentifierType: int
{
    case OPERATOR_SERVER = 1;
    case OPERATOR_CLIENT = 2;
}
