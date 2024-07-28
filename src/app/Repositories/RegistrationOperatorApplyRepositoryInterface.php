<?php

namespace App\Repositories;

use App\Models\RegistrationOperatorApply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface RegistrationOperatorApplyRepositoryInterface
{
    /**
     * 登録を行います
     *
     * @param array<string, mixed> $store_data
     * @param boolean $is_fetch_result
     * @return Model|null
     */
    public function save(array $store_data, bool $is_fetch_result = false): Model|null;

    /**
     * 管理者作成申請一覧をページネーションで取得
     *
     * @return LengthAwarePaginator<RegistrationOperatorApply>
     */
    public function fetchAppliesLengthAwarePaginator(): LengthAwarePaginator;
}
