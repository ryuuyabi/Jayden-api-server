<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

final class NewsModel extends BaseModel
{
    protected $table = 'news';

    protected const SELECT_INDEX = [
        'id',
        'name',
        'body',
        'is_active',
        'release_date',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'body',
        'is_active',
        'release_date',
        'operator_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function scopeSelectIndex(Builder $query)
    {
        $query->select(['id', 'name', 'body', 'is_active', 'release_date']);
    }
}
