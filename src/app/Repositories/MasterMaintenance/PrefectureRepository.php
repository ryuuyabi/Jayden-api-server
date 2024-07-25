<?php

namespace App\Repositories\MasterMaintenance;

use App\Models\Prefecture;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

final class PrefectureRepository implements PrefectureRepositoryInterface
{
    private Prefecture $model;

    public function __construct()
    {
        $this->model = new Prefecture();
    }

    /**
     * 新規登録
     *
     * @param array $store_data
     * @return Model
     */
    public function save(array $store_data): Model
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $model = $this->model;
        $model->fill($store_data)->save();
        return $model->refresh();
    }

    /**
     * 更新
     *
     * @param integer $prefecture_id
     * @param array $updated_data
     * @return Model
     */
    public function update(int $prefecture_id, array $updated_data): Model
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $model = $this->model->notDeleted()->findOrFail($prefecture_id);
        $model->fill($updated_data)->save();
        return $model->refresh();
    }

    /**
     * 都道府県一覧を取得します
     *
     * @return Collection
     */
    public function getPrefecturesCollectionSideOperator(): Collection
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->notDeleted()->get();
    }

    /**
     * 都道府県 詳細を取得します
     *
     * @param integer $prefecture_id
     * @return Model
     */
    public function findOrFail(int $prefecture_id): Model
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->notDeleted()->findOrFail($prefecture_id);
    }
}
