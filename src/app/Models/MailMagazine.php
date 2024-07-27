<?php

namespace App\Models;

/**
 * 
 *
 * @property int $id ID
 * @property string $body 本文
 * @property int $type タイプ
 * @property int $operator_id 管理者ID
 * @property string $release_at 公開時間
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon $updated_at 更新日
 * @property string $deleted_at 削除日
 * @method static \Illuminate\Database\Eloquent\Builder|MailMagazine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailMagazine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailMagazine query()
 * @method static \Illuminate\Database\Eloquent\Builder|MailMagazine whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailMagazine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailMagazine whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailMagazine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailMagazine whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailMagazine whereReleaseAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailMagazine whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MailMagazine whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class MailMagazine extends BaseModel
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
