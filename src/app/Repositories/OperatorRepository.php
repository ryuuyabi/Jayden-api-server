<?php

namespace App\Repositories;

use App\Concerns\Repository\RepositoryFindHandle;
use App\Concerns\Repository\RepositorySaveHandle;
use App\Models\Operator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

final class OperatorRepository implements OperatorRepositoryInterface
{
    use RepositoryFindHandle;
    use RepositorySaveHandle;

    /**
     * @var Operator model
     */
    private Operator $model;

    /**
     * instance
     */
    public function __construct()
    {
        $this->model = new Operator();
    }

    /**
     * 管理者をsubから取得する
     *
     * @param string $sub
     * @return Model|null
     */
    public function findFromSub(string $sub): Model|null
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->where('sub', $sub)->first();
    }

    /**
     * 管理側に表示する管理者一覧を取得します
     *
     * @param Request $request
     * @return LengthAwarePaginator<Operator>
     */
    public function getOperatorsLengthAwarePaginatorForOperatorSite(Request $request): LengthAwarePaginator
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->selectIndex()->whereRequest($request)->paginate(20);
    }
}
