<?php

namespace App\Models;

/**
 *
 *
 * @property int $operator_id
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon $updated_at 更新日
 * @method static \Illuminate\Database\Eloquent\Builder|CommonOperatorProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommonOperatorProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommonOperatorProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommonOperatorProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommonOperatorProfile whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommonOperatorProfile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class CommonOperatorProfile extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'operator_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];
}
