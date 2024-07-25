<?php

namespace App\Actions\User\UserProfile;

use App\Repositories\UserProfileRepositoryInterface;
use Illuminate\Support\Facades\Log;

final class UserProfileShowAction
{
    /**
     * @var UserProfileRepositoryInterface repository
     */
    private UserProfileRepositoryInterface $user_profile_repository;

    public function __construct(UserProfileRepositoryInterface $user_profile_repository)
    {
        $this->user_profile_repository = $user_profile_repository;
    }

    /**
     * ユーザプロフィール詳細
     *
     * @param integer $user_profile_id
     * @return array
     */
    public function __invoke(int $user_profile_id): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->user_profile_repository->findOrFail($user_profile_id)->toArray();
    }
}
