<?php

namespace App\Enums;

use Illuminate\Support\Carbon;

enum TokenTime: int
{
    case OPERATOR_ACCESS = 30;

    /**
     * トークンの期限時間をcarbonで取得
     *
     * @return Carbon
     */
    private function getDeadlineCarbon(): Carbon
    {
        return match ($this) {
            self::OPERATOR_ACCESS => now()->addMinutes(self::OPERATOR_ACCESS),
        };
    }

    /**
     * トークンの期限時間をunixで取得
     *
     * @return void
     */
    public function getDeadlineUnixTime()
    {
        return match ($this) {
            self::OPERATOR_ACCESS => self::OPERATOR_ACCESS->getDeadlineCarbon()->timestamp,
        };
    }
}
