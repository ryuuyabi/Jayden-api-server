<?php

namespace App\Http\Controllers\User;

use App\Actions\User\UserProfile\UserProfileShowAction;
use App\Actions\User\UserProfile\UserProfileStoreAction;
use App\Actions\User\UserProfile\UserProfileUpdateAction;
use App\Exceptions\NotFoundUserProfileException;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class UserProfileController extends BaseController
{
    /**
     * ユーザプロフィール登録
     *
     * @param Request $request
     * @param UserProfileStoreAction $action
     * @return void
     */
    public function store(Request $request, UserProfileStoreAction $action)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        try {
            $action($request->all());
            return $this->flashMessage('ユーザプロフィールの登録が完了しました');
        } catch (NotFoundUserProfileException $e) {
            Log::error($e->getMessage());
            return $this->flashMessageError();
        }
    }

    /**
     * ユーザプロフィール詳細
     *
     * @param integer $user_profile_id
     * @param UserProfileShowAction $action
     * @return void
     */
    public function show(int $user_profile_id, UserProfileShowAction $action)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->ApiJsonFormat([
            'user_profile' => $action($user_profile_id)
        ]);
    }

    /**
     * ユーザプロフィール更新
     *
     * @param Request $request
     * @param UserProfileUpdateAction $action
     * @return void
     */
    public function update(Request $request, UserProfileUpdateAction $action)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        try {
            $action($request->all());
            return $this->flashMessage('ユーザプロフィールの更新が完了しました');
        } catch (NotFoundUserProfileException $e) {
            Log::error($e->getMessage());
            return $this->flashMessageError();
        }
    }
}
