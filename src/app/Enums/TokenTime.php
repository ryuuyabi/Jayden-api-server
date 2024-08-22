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
        return now()->addMinutes($this->value)->copy();
    }

    /**
     * トークンの期限時間をunixで取得
     *
     * @return int|float|string
     */
    public function getDeadlineUnixTime(): int|float|string
    {
        return $this->getDeadlineCarbon()->timestamp;
    }
}
