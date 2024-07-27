<?php

namespace App\Repositories;

use App\Concerns\Repository\RepositoryFindHandle;
use App\Concerns\Repository\RepositorySoftDeleteHandle;
use App\Models\Operator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

final class OperatorRepository implements OperatorRepositoryInterface
{
    use RepositoryFindHandle;
    use RepositorySoftDeleteHandle;

    private Operator $model;

    public function __construct()
    {
        $this->model = new Operator();
    }

    public function save(array $store_data, bool $is_fetch_result = false): Model|null
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $model = $this->model;
        $model->personal_name = $model->createPersonalName($store_data['nick_name']);
        $model->fill($store_data)->save();
        return $model->refresh();
    }

    /**
     * 管理者をsubから取得する
     *
     * @param string $sub
     * @return Model
     */
    public function findFromSub(string $sub): Model
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->where('sub', $sub)?->first();
    }

    /**
     * 管理者subが利用可能か判定を返す
     *
     * @param string $sub
     * @return boolean
     */
    public function canSub(string $sub): bool
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->where('sub', $sub)->notDeleted()->exists();
    }

    /**
     * 管理側に表示する管理者一覧を取得します
     *
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getOperatorsLengthAwarePaginatorForOperatorSite(Request $request): LengthAwarePaginator
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->selectIndex()->whereRequest($request)->paginate(20);
    }
}
