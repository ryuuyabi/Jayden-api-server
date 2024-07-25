<?php

namespace App\Actions\Admin\MasterMaintenance\Prefecture;

use App\Enums\IsActive;
use App\Repositories\MasterMaintenance\PrefectureRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class PrefectureUpdateAction
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
     * 都道府県の更新を行います
     *
     * @param integer $prefecture_id
     * @param array $validate_data
     * @return string
     */
    public function __invoke(int $prefecture_id, array $validate_data): string
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $prefecture = $this->prefecture_repository->update($prefecture_id, $validate_data);
        if (IsActive::from($validate_data['is_active']) === IsActive::OFF) {
            Log::debug("{$prefecture->name}が行動不可となったので属する市町村区も行動不可にします");
        }
        return '都道府県の更新が完了しました';
    }
}
