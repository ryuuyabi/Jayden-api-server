<?php

namespace App\Actions\Admin\MasterMaintenance\District;

use App\Repositories\MasterMaintenance\DistrictRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class DistrictUpdateAction
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
     * 市区町村の更新を行います
     *
     * @param integer $district_id
     * @param array $validate_data
     * @return string
     */
    public function __invoke(int $district_id, array $validate_data): string
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $this->district_repository->update($district_id, $validate_data);
        return '市区町村の更新が完了しました';
    }
}
