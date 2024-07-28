<?php

namespace App\Actions\User\Cooking;

use App\Repositories\CookingRepositoryInterface;
use App\Services\UserAuth;
use Illuminate\Support\Facades\Log;

final class CookingStoreAction
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
     * @param array<string, mixed> $validate_data
     * @return void
     */
    public function __invoke(array $validate_data)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $this->saveCooking($validate_data);
        $this->saveCookingRecipes($validate_data['cooking_recipes']);
    }

    private function saveCooking(array $cookings): void
    {
        $this->cooking_repository->save(\array_merge($cookings, $this->user_auth->getIdArray()));
    }

    private function saveCookingRecipes(array $cooking_recipes): void
    {
        foreach ($cooking_recipes as $idx => $cooking_recipe) {
            // 料理内のレシピごとに並び順となるidxをセットします
            // 料理のレシピ一覧を登録します
        }
    }
}
