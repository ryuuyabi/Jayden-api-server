<?php

namespace App\Models;

/**
 * 
 *
 * @property int $user_id ユーザID
 * @property int $news_id ニュースID
 * @method static \Illuminate\Database\Eloquent\Builder|NewsRead newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsRead newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsRead query()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsRead whereNewsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsRead whereUserId($value)
 * @mixin \Eloquent
 */
final class NewsRead extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'news_id',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];
}
