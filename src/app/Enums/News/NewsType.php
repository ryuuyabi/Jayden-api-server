<?php

namespace App\Enums\News;

enum NewsType: int
{
    case USER = 1;
    case ADMIN = 2;
    case EVERYONE = 3;
}
