<?php

namespace App\Models;

/**
 * 
 *
 * @property int $id
 * @property string $email メールアドレス
 * @property string $status ステータス
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon|null $updated_at 更新日
 * @property string|null $deleted_at 削除日
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationOperatorApply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationOperatorApply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationOperatorApply query()
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationOperatorApply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationOperatorApply whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationOperatorApply whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationOperatorApply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationOperatorApply whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistrationOperatorApply whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class RegistrationOperatorApply extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];
}
