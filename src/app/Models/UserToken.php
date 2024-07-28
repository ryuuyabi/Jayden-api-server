<?php

namespace App\Models;

use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $user_id ユーザID
 * @property Carbon $access_token アクセストークン
 * @property string $access_token_expires_at アクセストークン有効期限
 * @property Carbon|null $refresh_token リフレッシュトークン
 * @property string|null $refresh_token_expires_at リフレッシュトークン有効期限
 * @method static \Illuminate\Database\Eloquent\Builder|UserToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserToken whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserToken whereAccessTokenExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserToken whereRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserToken whereRefreshTokenExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserToken whereUserId($value)
 * @mixin \Eloquent
 */
final class UserToken extends BaseModel
{
    private const ACCESS_TOKEN_ADD_MINUTE = 60;
    private const REFRESH_TOKEN_ADD_DAY = 60;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'access_token',
        'access_token_expires_at',
        'refresh_token',
        'refresh_token_expires_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'access_token' => 'date',
            'refresh_token' => 'date',
        ];
    }

    public function createAccessTokenExpiresAt(): Carbon
    {
        return now()->addMinute(self::ACCESS_TOKEN_ADD_MINUTE);
    }

    public function createRefreshTokenExpiresAt(): Carbon
    {
        return now()->addDay(self::REFRESH_TOKEN_ADD_DAY);
    }
}
