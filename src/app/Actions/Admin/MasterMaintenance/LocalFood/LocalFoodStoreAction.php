<?php

namespace App\Actions\Admin\MasterMaintenance\LocalFood;

use App\Repositories\MasterMaintenance\LocalFoodRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class LocalFoodStoreAction
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
     * 郷土料理の新規登録を行います
     *
     * @param array<string, mixed> $validate_data
     * @return string
     */
    public function __invoke(array $validate_data): string
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $this->local_food_repository->save($validate_data);
        return '郷土料理登録が完了しました';
    }
}
