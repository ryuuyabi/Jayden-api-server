<?php

namespace App\Models;

/**
 * 
 *
 * @property int $cooking_id 料理ID
 * @property string $sub_title サブタイトル
 * @property string $body 本文
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon|null $updated_at 更新日
 * @method static \Illuminate\Database\Eloquent\Builder|CookingRecipe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CookingRecipe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CookingRecipe query()
 * @method static \Illuminate\Database\Eloquent\Builder|CookingRecipe whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookingRecipe whereCookingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookingRecipe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookingRecipe whereSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CookingRecipe whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class CookingRecipe extends BaseModel
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
