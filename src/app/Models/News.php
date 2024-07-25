<?php

namespace App\Models;

use App\Enums\IsActive;
use App\Enums\News\NewsType;
use Illuminate\Database\Eloquent\Builder;

final class News extends BaseModel
{
    protected $table = 'news';

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
            'is_active' => IsActive::class,
        ];
    }

    public function scopeSelectTop(Builder $query): void
    {
        $query->select(['name', 'body', 'is_active', 'release_date']);
    }

    public function scopeTargetOperator(Builder $query): void
    {
        $query->whereIn('news_type', [NewsType::EVERYONE, NewsType::ADMIN]);
    }
}
