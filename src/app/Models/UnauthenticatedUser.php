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
