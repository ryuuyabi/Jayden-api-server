<?php

namespace App\Repositories;

use App\Exceptions\NotFoundUnauthenticatedUserException;
use App\Models\UnauthenticatedUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

final class UnauthenticatedUserRepository implements UnauthenticatedUserRepositoryInterface
{
    private UnauthenticatedUser $model;

    public function __construct()
    {
        $this->model = new UnauthenticatedUser();
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

        $this->model->fill(['expires_at' => now()->addMinute(30), ...$store_data])->save();
    }

    /**
     * 詳細を取得
     *
     * @param string $id
     * @return Model
     *
     * @throws NotFoundUnauthenticatedUserException
     */
    public function findOrFail(string $id): Model
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
        Log::debug("ID: {$id}の未認証ユーザを取得します");

        return $this->model->where('id', $id)?->first() ?? throw new NotFoundUnauthenticatedUserException('idの未認証ユーザが見つかりませんでした');
    }

    /**
     * 削除
     *
     * @param string $id
     * @return void
     */
    public function destroy(string $id): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
        Log::debug("ID: {$id}の未認証ユーザを削除します");

        $this->model->where('id', $id)?->delete() ?? throw new NotFoundUnauthenticatedUserException('idの未認証ユーザが見つからないので削除できません');
    }
}
