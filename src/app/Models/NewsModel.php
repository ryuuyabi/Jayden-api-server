<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * 
 *
 * @property int $id
 * @property string $name 名称
 * @property string $body 本文
 * @property bool $is_active 行動判定
 * @property string $release_date 公開日
 * @property int $news_type お知らせ区分
 * @property int $user_id ユーザID
 * @property int $operator_id 管理者ID
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon $updated_at 更新日
 * @method static Builder|NewsModel newModelQuery()
 * @method static Builder|NewsModel newQuery()
 * @method static Builder|NewsModel query()
 * @method static Builder|NewsModel selectIndex()
 * @method static Builder|NewsModel whereBody($value)
 * @method static Builder|NewsModel whereCreatedAt($value)
 * @method static Builder|NewsModel whereId($value)
 * @method static Builder|NewsModel whereIsActive($value)
 * @method static Builder|NewsModel whereName($value)
 * @method static Builder|NewsModel whereNewsType($value)
 * @method static Builder|NewsModel whereOperatorId($value)
 * @method static Builder|NewsModel whereReleaseDate($value)
 * @method static Builder|NewsModel whereUpdatedAt($value)
 * @method static Builder|NewsModel whereUserId($value)
 * @mixin \Eloquent
 */
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
