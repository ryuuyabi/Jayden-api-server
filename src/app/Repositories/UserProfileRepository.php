<?php

namespace App\Repositories;

use App\Exceptions\NotFoundUserProfileException;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

final class UserProfileRepository implements UserProfileRepositoryInterface
{
    private UserProfile $model;

    public function __construct()
    {
        $this->model = new UserProfile();
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

        if (isset($store_data['id'])) {
            $this->model = $this->model->findOrFail($store_data['id']);
        }
        $this->model->fill($store_data)->save();
    }

    /**
     * 詳細
     *
     * @param integer $id
     * @return Model
     */
    public function findOrFail(int $id): Model
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->find($id) ?? throw new NotFoundUserProfileException('ユーザプロフィールが見つかりませんでした');
    }
}
