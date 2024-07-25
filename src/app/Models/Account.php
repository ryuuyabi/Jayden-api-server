<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

final class Account extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cognito_username',
        'cognito_sub',
        'registration_status',
        'user_id',
        'operator_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'cognito_username',
        'cognito_sub'
    ];

    public function operator(): HasOne
    {
        return $this->hasOne(Operator::class, 'id', 'operator_id');
    }
}
