<?php

namespace App\Repositories;

use App\Models\NewsRead;
use Illuminate\Support\Facades\Log;

final class NewsReadRepository implements NewsReadRepositoryInterface
{
    private NewsRead $model;

    public function __construct()
    {
        $this->model = new NewsRead();
    }

    /**
     * 新規登録
     *
     * @param array $store_data
     * @return void
     */
    public function save(array $store_data): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $this->model->fill($store_data)->save();
    }

    /**
     * 既読済みか判定
     *
     * @param integer $new_id
     * @param integer $user_id
     * @return boolean
     */
    public function isReadNews(int $new_id, int $user_id): bool
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->where('news_id', $new_id)->where('user_id', $user_id)->exists();
    }
}
