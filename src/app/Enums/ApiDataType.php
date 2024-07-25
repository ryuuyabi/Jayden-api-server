<?php

namespace App\Enums;

enum ApiDataType: int
{
    case ERROR = 0;
    case NORMAL = 1;
    case FLASH_MESSAGE = 2;
    case VALIDATE_ERROR = 3;
}
