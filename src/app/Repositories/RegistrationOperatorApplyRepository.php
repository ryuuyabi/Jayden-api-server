<?php

namespace App\Repositories;

use App\Concerns\Repository\RepositorySaveHandle;
use App\Models\RegistrationOperatorApply;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

final class RegistrationOperatorApplyRepository implements RegistrationOperatorApplyRepositoryInterface
{
    use RepositorySaveHandle;

    /**
     * @var RegistrationOperatorApply model
     */
    private RegistrationOperatorApply $model;

    /**
     * instance
     */
    public function __construct()
    {
        $this->model = new RegistrationOperatorApply();
    }

    /**
     * 管理者作成申請一覧をページネーションで取得
     *
     * @return LengthAwarePaginator<RegistrationOperatorApply>
     */
    public function fetchAppliesLengthAwarePaginator(): LengthAwarePaginator
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->paginate(50);
    }
}
