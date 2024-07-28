<?php

namespace App\Concerns\Queries;

use App\Enums\IsActive;
use Illuminate\Database\Eloquent\Builder;

trait ActiveHandle
{
    /**
     * 行動可能状態を絞り込みます
     *
     * @param Builder $query
     * @return void
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', IsActive::ON);
    }

    /**
     * 行動不可状態を絞り込みます
     *
     * @param Builder $query
     * @return void
     */
    public function scopePassive(Builder $query): void
    {
        $query->where('is_active', IsActive::OFF);
    }
}
