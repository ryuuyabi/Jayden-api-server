<?php

namespace App\Enums\MailMagazine;

enum MailMagazineType: int
{
    case ALL = 1;
    case USER = 2;
    case USER_ALL = 3;
    case OPERATOR = 4;
    case OPERATOR_ALL = 5;
}
