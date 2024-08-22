<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 *
 * @property int $id
 * @property string $name 名称
 * @property int $notification_type 通知区分
 * @property int $notification_account_type 通知アカウント区分
 * @property int|null $user_id ユーザID
 * @property int|null $operator_id 管理者ID
 * @property \Illuminate\Support\Carbon $created_at 作成日
 * @property \Illuminate\Support\Carbon $updated_at 更新日
 * @property \Illuminate\Support\Carbon|null $deleted_at 削除日
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereNotificationAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereNotificationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereOperatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification withoutTrashed()
 * @mixin \Eloquent
 */
final class Notification extends BaseModel
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'notification_type',
        'notification_account_type',
        'user_id',
        'operator_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];
}
