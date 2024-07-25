<?php

namespace App\Actions\Admin\MasterMaintenance\LocalFood;

use App\Repositories\MasterMaintenance\LocalFoodRepositoryInterface;

final class LocalFoodIndexAction
{
    /**
     * @var LocalFoodRepositoryInterface repository
     */
    public LocalFoodRepositoryInterface $local_food_repository;

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
     * 郷土料理一覧を取得するため
     *
     * @return array
     */
    public function __invoke(): array
    {
        return $this->local_food_repository->getLocalFoodsLengthAwarePaginatorSideOperator()->toArray();
    }
}
