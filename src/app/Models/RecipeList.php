<?php

namespace App\Models;

/**
 * 
 *
 * @property int $id
 * @property int $operator_id 管理者ID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeList query()
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeList whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecipeList whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class RecipeList extends BaseModel
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
