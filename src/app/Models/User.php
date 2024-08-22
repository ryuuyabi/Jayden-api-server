<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * 
 *
 * @property int $id
 * @property string $personal_name 個人名 @から始まる
 * @property string|null $nickname ニックネーム
 * @property string $email メールアドレス
 * @property int|string $status ステータス
 * @property int|string $is_notion 通知判定
 * @property int|string $is_active 行動判定
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon $updated_at 更新日
 * @property string|null $deleted_at 削除日
 * @property-read \App\Models\UserProfile|null $userProfile
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIsActive($value)
 * @method static Builder|User whereIsNotion($value)
 * @method static Builder|User whereNickname($value)
 * @method static Builder|User wherePersonalName($value)
 * @method static Builder|User whereStatus($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @property string $sub ユーザサブ
 * @method static Builder|User whereSub($value)
 * @mixin \Eloquent
 */
final class User extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sub',
        'personal_name',
        'nickname',
        'email',
        'status',
        'is_notion',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [];
    }

    /**
     * user_profilesテーブルを取得
     *
     * @return HasOne<UserProfile>
     */
    public function userProfile(): HasOne
    {
        return $this->hasOne(UserProfile::class, 'id', 'user_id');
    }
}
