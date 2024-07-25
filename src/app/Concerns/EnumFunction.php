<?php

namespace App\Concerns;

use function array_column;

trait EnumFunction
{
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
