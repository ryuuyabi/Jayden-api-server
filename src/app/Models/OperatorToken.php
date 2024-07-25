<?php

namespace App\Models;

final class OperatorToken extends BaseModel
{
    protected $table = 'operator_tokens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'refresh_token',
        'expired_at',
        'operator_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'refresh_token'
    ];

    public $timestamps = false;

    public static function createRefreshTokenUpdateOperator(int $operator_id, string $refresh_token): void
    {
        self::query()->create([
            'operator_id' => $operator_id,
            'refresh_token' => $refresh_token,
            'expired_at' => now()->addDay(90),
        ]);
    }
}
