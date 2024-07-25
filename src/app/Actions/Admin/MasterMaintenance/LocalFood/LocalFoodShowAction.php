<?php

namespace App\Actions\Admin\MasterMaintenance\LocalFood;

use App\Repositories\MasterMaintenance\LocalFoodRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class LocalFoodShowAction
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
     * 郷土料理の詳細を取得するため
     *
     * @param integer $local_food_id
     * @return array
     */
    public function __invoke(int $local_food_id): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->local_food_repository->findOrFail($local_food_id)->toArray();
    }
}
