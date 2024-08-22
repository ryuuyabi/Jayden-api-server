<?php

namespace App\Models;

/**
 * 
 *
 * @property int $id id
 * @property string $email メールアドレス
 * @property string $expires_at 有効期限
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon|null $updated_at 更新日
 * @method static \Illuminate\Database\Eloquent\Builder|UnauthenticatedUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UnauthenticatedUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UnauthenticatedUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|UnauthenticatedUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnauthenticatedUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnauthenticatedUser whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnauthenticatedUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnauthenticatedUser whereUpdatedAt($value)
 * @property string $personal_name 個人名 @から始まる
 * @property string|null $nickname ニックネーム
 * @property int $status ステータス
 * @property int $is_notion 通知判定
 * @property int $is_active 行動判定
 * @method static \Illuminate\Database\Eloquent\Builder|UnauthenticatedUser whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnauthenticatedUser whereIsNotion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnauthenticatedUser whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnauthenticatedUser wherePersonalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnauthenticatedUser whereStatus($value)
 * @mixin \Eloquent
 */
final class UnauthenticatedUser extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'email',
        'expires_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];
}
