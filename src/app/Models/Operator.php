<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 *
 *
 * @property int $id ID
 * @property string $sub 管理者サブ
 * @property string $personal_name 個人名 @から始まる
 * @property string|null $nickname ニックネーム
 * @property string $email メールアドレス
 * @property string|null $ip_address IPアドレス
 * @property int|string $role 権限
 * @property int|string $is_notion 通知判定
 * @property int|string $is_active 行動判定
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon $updated_at 更新日
 * @property string|null $deleted_at 削除日
 * @method static Builder|Operator newModelQuery()
 * @method static Builder|Operator newQuery()
 * @method static Builder|Operator query()
 * @method static Builder|Operator whereCreatedAt($value)
 * @method static Builder|Operator whereDeletedAt($value)
 * @method static Builder|Operator whereEmail($value)
 * @method static Builder|Operator whereId($value)
 * @method static Builder|Operator whereIpAddress($value)
 * @method static Builder|Operator whereIsActive($value)
 * @method static Builder|Operator whereIsNotion($value)
 * @method static Builder|Operator whereNickname($value)
 * @method static Builder|Operator wherePersonalName($value)
 * @method static Builder|Operator whereRole($value)
 * @method static Builder|Operator whereSub($value)
 * @method static Builder|Operator whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class Operator extends BaseModel
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
        'ip_address',
        'tmp_password',
        'role',
        'is_notion',
        'is_active',
        'icon_image_url',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'sub',
        'tmp_password',
        'ip_address',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [];
    }

    public function createPersonalName(string $nickname): string
    {
        return "@{$nickname}";
    }
}
