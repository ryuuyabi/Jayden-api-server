<?php

namespace App\Models;

/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|LocalFood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LocalFood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LocalFood query()
 * @mixin \Eloquent
 */
final class LocalFood extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prefecture_id',
        'name',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];
}
