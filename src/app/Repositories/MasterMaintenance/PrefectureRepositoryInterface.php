<?php

namespace App\Repositories\MasterMaintenance;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface PrefectureRepositoryInterface
{
    public function save(array $store_data, bool $is_fetch_result = false): Model|null;
    public function update(int $prefecture_id, array $updated_data): Model;
    public function getPrefecturesCollectionSideOperator(): Collection;
    public function findOrFail(int $prefecture_id): Model;
}
