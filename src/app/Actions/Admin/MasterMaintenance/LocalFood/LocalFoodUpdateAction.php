<?php

namespace App\Actions\Admin\MasterMaintenance\LocalFood;

use App\Repositories\MasterMaintenance\LocalFoodRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class LocalFoodUpdateAction
{
    /**
     * @var LocalFoodRepositoryInterface repository
     */
    private LocalFoodRepositoryInterface $local_food_repository;

    /**
     * instance
     *
     * @param LocalFoodRepositoryInterface $local_food_repository
     */
    public function __construct(LocalFoodRepositoryInterface $local_food_repository)
    {
        $this->local_food_repository = $local_food_repository;
    }

    /**
     * 郷土料理の更新を行います
     *
     * @param integer $local_food_id
     * @param array<string, mixed> $validate_data
     * @return string
     */
    public function __invoke(int $local_food_id, array $validate_data): string
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $this->local_food_repository->update($validate_data, $local_food_id);
        return '郷土料理の更新が完了しました';
    }
}
