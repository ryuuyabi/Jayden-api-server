<?php

namespace App\Actions\User\Cooking;

use App\Repositories\CookingRepositoryInterface;
use App\Services\UserAuth;
use Illuminate\Support\Facades\Log;

final class CookingIndexAction
{
    /**
     * @var UserAuth service
     */
    private UserAuth $user_auth;

    /**
     * @var CookingRepositoryInterface repository
     */
    private CookingRepositoryInterface $cooking_repository;

    public function __construct(CookingRepositoryInterface $cooking_repository)
    {
        $this->cooking_repository = $cooking_repository;
    }

    /**
     * 料理の保存を行います
     *
     * @param array $validate_data
     * @return void
     */
    public function __invoke(array $validate_data)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $this->cooking_repository->save(\array_merge($validate_data, $this->user_auth->getIdArray()));
    }
}
