<?php

namespace App\Models;

/**
 * 
 *
 * @property int $id ID
 * @property string $name 県名
 * @property string $origin_name 県名 都道府県を含まない
 * @property string $code 県コード
 * @property int $is_active 行動判定
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon|null $updated_at 更新日
 * @property string|null $deleted_at 削除日
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture query()
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereOriginName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Prefecture whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class Prefecture extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'origin_name',
        'code',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * キャストする属性の取得
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y/m/d',
            'updated_at' => 'datetime:Y/m/d',
        ];
    }
}
