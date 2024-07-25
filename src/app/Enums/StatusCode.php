<?php

namespace App\Enums;

enum StatusCode: int
{
    case SUCCESS = 200;
    case NOT_FOUND = 404;
    case UNPROCESSABLE_ENTITY = 422;
}
