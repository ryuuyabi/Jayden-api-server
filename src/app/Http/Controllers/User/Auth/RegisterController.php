<?php

namespace App\Http\Controllers\User\Auth;

use App\Actions\User\Auth\Register\RegisterEmailVerificationAction;
use App\Actions\User\Auth\Register\RegisterStoreAction;
use App\Exceptions\InvalidHashEmailException;
use App\Exceptions\InvalidUuidException;
use App\Exceptions\NotFoundUnauthenticatedUserException;
use App\Http\Controllers\BaseController;
use App\Http\Requests\User\Auth\Register\RegisterStoreRequest;
use Illuminate\Support\Facades\Log;

final class RegisterController extends BaseController
{
    /**
     * 承認前ユーザの新規登録を行います
     * この処理でユーザの新規登録は完了しない
     * メールアドレス認証のメールを送信します
     *
     * @param RegisterStoreRequest $request
     * @param RegisterStoreAction $action
     * @return void
     */
    public function store(RegisterStoreRequest $request, RegisterStoreAction $action)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
        Log::debug('未認証ユーザの新規登録を行います');

        $action($request->validated());
    }

    /**
     * 承認前ユーザからユーザの登録を行います
     *
     * @param string $id
     * @param string $hash
     * @param RegisterEmailVerificationAction $action
     * @return void
     */
    public function emailVerification(string $id, string $hash, RegisterEmailVerificationAction $action)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
        Log::debug('ユーザの新規登録メールアドレス認証を行います');

        try {
            $action($id, $hash);
            return $this->flashMessage('ユーザ登録が成功しました');
        } catch (InvalidUuidException $e) {
            Log::error($e->getMessage());
            return $this->flashMessageError();
        } catch (InvalidHashEmailException $e) {
            Log::error($e->getMessage());
            return $this->flashMessageError();
        } catch (NotFoundUnauthenticatedUserException $e) {
            Log::error($e->getMessage());
            return $this->flashMessageError();
        }
    }
}
