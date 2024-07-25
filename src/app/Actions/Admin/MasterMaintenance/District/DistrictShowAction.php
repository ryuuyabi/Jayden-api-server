<?php

namespace App\Actions\Admin\MasterMaintenance\District;

use App\Repositories\MasterMaintenance\DistrictRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class DistrictShowAction
{
    /**
     * @var DistrictRepositoryInterface repository
     */
    public DistrictRepositoryInterface $district_repository;

    /**
     * instance
     *
     * @param DistrictRepositoryInterface $district_repository
     */
    public function __construct(DistrictRepositoryInterface $district_repository)
    {
        $this->district_repository = $district_repository;
    }

    /**
     * 市区町村の詳細を取得します
     *
     * @param integer $district_id
     * @return array
     */
    public function __invoke(int $district_id): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->district_repository->findOrFail($district_id)->toArray();
    }
}
