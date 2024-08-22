<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    /**
     * ユーザを登録します
     *
     * @param array<string, mixed> $store_data
     * @param boolean $is_fetch_result
     * @return Model|null
     */
    public function save(array $store_data, bool $is_fetch_result = false): Model|null;

    /**
     * ユーザ詳細を取得します
     *
     * @param integer $id
     * @return Model
     */
    public function findOrFail(int $id): Model;

    /**
     * メールアドレスからユーザ詳細を取得します
     *
     * @param string $email
     * @return Model
     */
    public function findOrFairFromEmail(string $email): Model;

    /**
     * ユーザをページネーションで取得します
     *
     * @param integer $page
     * @return LengthAwarePaginator<User>
     */
    public function getUsersLengthAwarePaginatorForOperatorSite(int $page): LengthAwarePaginator;
}
