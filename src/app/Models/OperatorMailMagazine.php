<?php

namespace App\Models;

/**
 * 
 *
 * @property int $mail_magazine_id メールマガジンID
 * @property int $operator_id
 * @method static \Illuminate\Database\Eloquent\Builder|OperatorMailMagazine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OperatorMailMagazine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OperatorMailMagazine query()
 * @method static \Illuminate\Database\Eloquent\Builder|OperatorMailMagazine whereMailMagazineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperatorMailMagazine whereOperatorId($value)
 * @mixin \Eloquent
 */
final class OperatorMailMagazine extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];
}
