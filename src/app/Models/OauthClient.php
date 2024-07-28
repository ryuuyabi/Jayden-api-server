<?php

namespace App\Models;

/**
 * 
 *
 * @property string $client_id クライアントID
 * @property string $client_secret リダイレクトURI
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon|null $updated_at 更新日
 * @property string|null $deleted_at 削除日
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient query()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient whereClientSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class OauthClient extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id',
        'client_secret'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];
}
