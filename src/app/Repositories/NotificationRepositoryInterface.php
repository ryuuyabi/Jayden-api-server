<?php

namespace App\Repositories;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Collection;

interface NotificationRepositoryInterface
{
    /**
     * 管理画面TOPで表示する通知一覧
     *
     * @return Collection<int, Notification>
     */
    public function getNotificationsForOperatorTop(): Collection;
}
