<?php

namespace App\Repositories;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Collection;

final class NotificationRepository implements NotificationRepositoryInterface
{
    /**
     * @var Notification model
     */
    private Notification $model;

    /**
     * instance
     */
    public function __construct()
    {
        $this->model = new Notification();
    }

    /**
     * 管理画面TOPで表示する通知一覧
     *
     * @return Collection<int, Notification>
     */
    public function getNotificationsForOperatorTop(): Collection
    {
        return $this->model->get();
    }
}
