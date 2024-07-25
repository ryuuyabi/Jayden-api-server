<?php

namespace App\Models;

use Illuminate\Support\Carbon;

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
