<?php

namespace App\Actions\Admin\MasterMaintenance\District;

use App\Repositories\MasterMaintenance\DistrictRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class DistrictIndexAction
{
    /**
     * @var DistrictRepositoryInterface repository
     */
    public DistrictRepositoryInterface $district_repository;

    public function __construct(DistrictRepositoryInterface $district_repository)
    {
        $this->district_repository = $district_repository;
    }

    /**
     * 市区町村一覧を取得するため
     *
     * @return array
     */
    public function __invoke(): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->district_repository->getDistrictsLengthAwarePaginatorSideOperator()->toArray();
    }
}
