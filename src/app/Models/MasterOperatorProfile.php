<?php

namespace App\Models;

/**
 * 
 *
 * @property int $operator_id
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon $updated_at 更新日
 * @method static \Illuminate\Database\Eloquent\Builder|MasterOperatorProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MasterOperatorProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MasterOperatorProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|MasterOperatorProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterOperatorProfile whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterOperatorProfile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class MasterOperatorProfile extends BaseModel
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
