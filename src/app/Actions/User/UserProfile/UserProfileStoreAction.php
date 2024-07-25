<?php

namespace App\Actions\User\UserProfile;

use App\Enums\S3Dir;
use App\Repositories\UserProfileRepositoryInterface;
use App\Services\Image;
use Illuminate\Support\Facades\Log;

final class UserProfileStoreAction
{
    /**
     * @var Image service
     */
    private Image $image;

    /**
     * @var UserProfileRepositoryInterface repository
     */
    private UserProfileRepositoryInterface $user_profile_repository;

    public function __construct(UserProfileRepositoryInterface $user_profile_repository)
    {
        $this->user_profile_repository = $user_profile_repository;
        $this->image = new Image(S3Dir::USER_PROFILE);
    }

    /**
     * ユーザプロフィール新規登録
     *
     * @param array $store_data
     * @return void
     */
    public function __invoke(array $store_data): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $store_data['icon_image_url'] = $this->image->upload($store_data['icon']);
        $this->user_profile_repository->save($store_data);
    }
}
