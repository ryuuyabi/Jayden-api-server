<?php

namespace App\Actions\Admin\User;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class UserIndexAction
{
    /**
     * @var UserRepositoryInterface repository
     */
    private UserRepositoryInterface $user_repository;

    /**
     * instance
     *
     * @param UserRepositoryInterface $user_repository
     */
    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    /**
     * ユーザ一覧を取得します
     *
     * @param array<string, mixed> $request_data
     * @return array<string, mixed>
     */
    public function __invoke(array $request_data): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->user_repository->getUsersLengthAwarePaginatorForOperatorSite($request_data['page'])->toArray();
    }
}
