<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property string $sub
 * @property int $identifier_type 識別子種類
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon|null $updated_at 更新日
 * @property \Illuminate\Support\Carbon|null $deleted_at 削除日
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier whereIdentifierType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier whereSub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier withoutTrashed()
 * @mixin \Eloquent
 */
final class Identifier extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sub',
        'identifier_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];
}
