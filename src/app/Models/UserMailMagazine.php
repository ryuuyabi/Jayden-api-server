<?php

namespace App\Models;

/**
 * 
 *
 * @property int $mail_magazine_id メールマガジンID
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|UserMailMagazine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMailMagazine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMailMagazine query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserMailMagazine whereMailMagazineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserMailMagazine whereUserId($value)
 * @mixin \Eloquent
 */
final class UserMailMagazine extends BaseModel
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
