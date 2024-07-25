<?php

namespace App\Actions\Admin\MasterMaintenance\Prefecture;

use App\Repositories\MasterMaintenance\PrefectureRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class PrefectureShowAction
{
    /**
     * @var PrefectureRepositoryInterface repository
     */
    private PrefectureRepositoryInterface $prefecture_repository;

    public function __construct(PrefectureRepositoryInterface $prefecture_repository)
    {
        $this->prefecture_repository = $prefecture_repository;
    }

    /**
     * マスタメンテナンス 都道府県一覧を取得するため
     *
     * @return array
     */
    public function __invoke(int $prefecture_id): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->prefecture_repository->findOrFail($prefecture_id)->toArray();
    }
}
