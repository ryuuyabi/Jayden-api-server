<?php

namespace App\Actions\Admin\MasterMaintenance\District;

use App\Repositories\MasterMaintenance\DistrictRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class DistrictStoreAction
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
     * 市区町村の新規登録を行います
     *
     * @param array<string, mixed> $validate_data
     * @return string
     */
    public function __invoke(array $validate_data): string
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $this->district_repository->save($validate_data);
        return '地区の新規登録が完了しました';
    }
}
