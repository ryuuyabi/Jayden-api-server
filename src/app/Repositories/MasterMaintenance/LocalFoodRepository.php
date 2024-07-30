<?php

namespace App\Repositories\MasterMaintenance;

use App\Concerns\Repository\RepositoryFindHandle;
use App\Concerns\Repository\RepositorySaveHandle;
use App\Concerns\Repository\RepositoryUpdateHandle;
use App\Models\LocalFood;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

final class LocalFoodRepository implements LocalFoodRepositoryInterface
{
    use RepositorySaveHandle;
    use RepositoryUpdateHandle;
    use RepositoryFindHandle;

    private LocalFood $model;

    public function __construct()
    {
        $this->model = new LocalFood();
    }

    /**
     * 郷土料理一覧を取得します
     *
     * @return LengthAwarePaginator<LocalFood>
     */
    public function getLocalFoodsLengthAwarePaginatorSideOperator(): LengthAwarePaginator
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->notDeleted()->paginate(20);
    }
}
