<?php

namespace App\Models;

/**
 * 
 *
 * @property int $id
 * @property int $user_id ユーザID
 * @property string $nickname ニックネーム
 * @property string|null $sei_name 姓
 * @property string|null $mei_name 名
 * @property string|null $kana_sei_name 姓 カナ
 * @property string|null $kana_mei_name 名 カナ
 * @property int $prefecture 県
 * @property int|null $district 地区
 * @property int|null $occupation 職業
 * @property string $icon_image_url アイコンURL
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon|null $updated_at 更新日
 * @property string|null $deleted_at 削除日
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereIconImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereKanaMeiName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereKanaSeiName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereMeiName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile wherePrefecture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereSeiName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserId($value)
 * @mixin \Eloquent
 */
final class UserProfile extends BaseModel
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
