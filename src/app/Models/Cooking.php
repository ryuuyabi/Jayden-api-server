<?php

namespace App\Models;

/**
 * 
 *
 * @property int $id
 * @property string $name 名前
 * @property string $description 説明
 * @property int $type 料理区分
 * @property int|null $prefecture 県
 * @property int|null $user_id ユーザID
 * @property int|null $operator_id 管理者ID
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon|null $updated_at 更新日
 * @property string|null $deleted_at 削除日
 * @method static \Illuminate\Database\Eloquent\Builder|Cooking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cooking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cooking query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cooking whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cooking whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cooking whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cooking whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cooking whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cooking whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cooking wherePrefecture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cooking whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cooking whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cooking whereUserId($value)
 * @mixin \Eloquent
 */
final class Cooking extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];
}
