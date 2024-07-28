<?php

namespace App\Models;

use App\Enums\IsActive;
use App\Enums\News\NewsType;
use Illuminate\Database\Eloquent\Builder;

/**
 * 
 *
 * @property int $id
 * @property string $name 名称
 * @property string $body 本文
 * @property IsActive $is_active 行動判定
 * @property string $release_date 公開日
 * @property int $news_type お知らせ区分
 * @property int $user_id ユーザID
 * @property int $operator_id 管理者ID
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon $updated_at 更新日
 * @method static Builder|News newModelQuery()
 * @method static Builder|News newQuery()
 * @method static Builder|News query()
 * @method static Builder|News selectTop()
 * @method static Builder|News targetOperator()
 * @method static Builder|News whereBody($value)
 * @method static Builder|News whereCreatedAt($value)
 * @method static Builder|News whereId($value)
 * @method static Builder|News whereIsActive($value)
 * @method static Builder|News whereName($value)
 * @method static Builder|News whereNewsType($value)
 * @method static Builder|News whereOperatorId($value)
 * @method static Builder|News whereReleaseDate($value)
 * @method static Builder|News whereUpdatedAt($value)
 * @method static Builder|News whereUserId($value)
 * @mixin \Eloquent
 */
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
