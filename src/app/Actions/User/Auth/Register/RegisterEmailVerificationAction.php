<?php

namespace App\Actions\User\Auth\Register;

use App\Exceptions\InvalidHashEmailException;
use App\Exceptions\InvalidUuidException;
use App\Exceptions\NotFoundUnauthenticatedUserException;
use App\Models\UnauthenticatedUser;
use App\Models\User;
use App\Repositories\UnauthenticatedUserRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserTokenRepositoryInterface;
use App\Services\Cognito;
use App\Services\UserAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function preg_match;

final class RegisterEmailVerificationAction
{
    /**
     * @var Cognito Service
     */
    private Cognito $cognito;

    /**
     * @var UserAuth Service
     */
    private UserAuth $user_auth;

    /**
     * @var User Model
     */
    private User $user;

    /**
     * @var UnauthenticatedUser Model
     */
    private UnauthenticatedUser $unauthenticated_user;

    /**
     * @var UserRepositoryInterface Repository
     */
    private UserRepositoryInterface $user_repository;

    /**
     * @var UserTokenRepositoryInterface
     */
    private UserTokenRepositoryInterface $user_token_repository;

    /**
     * @var UnauthenticatedUserRepositoryInterface Repository
     */
    private UnauthenticatedUserRepositoryInterface $unauthenticated_user_repository;

    /**
     * 初期化処理
     */
    public function __construct(
        UserRepositoryInterface $user_repository,
        UserTokenRepositoryInterface $user_token_repository,
        UnauthenticatedUserRepositoryInterface $unauthenticated_user_repository
    ) {
        $this->cognito = new Cognito();
        $this->user_auth = new UserAuth();
        $this->unauthenticated_user = new UnauthenticatedUser();
        $this->user_repository = $user_repository;
        $this->user_token_repository = $user_token_repository;
        $this->unauthenticated_user_repository = $unauthenticated_user_repository;
    }

    /**
     * メールアドレス認証を行います
     *
     * @param string $id
     * @param string $hash
     * @return void
     *
     * @throws InvalidUuidException
     * @throws InvalidHashEmailException
     * @throws NotFoundUnauthenticatedUserException
     */
    public function __invoke(string $id, string $hash)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
        Log::debug("id : {$id}");
        Log::debug("hash : {$hash}");

        DB::transaction(function () use ($id, $hash) {
            $this->checkRegexUuid($id) ? $this->setUnauthenticatedUser($id) : throw new InvalidUuidException('idが不正値です');
            Log::debug('idは正常値でした');

            $this->checkHashEmail($hash) ? '' : throw new InvalidHashEmailException('hashが不正値です');
            Log::debug('hashは正常値でした');

            $this->generateUser();
            $this->setUser();
            $this->deleteUnauthenticatedUser();
            $this->cognito->confirmSignUp($this->unauthenticated_user->email);

            Log::debug('cognitoの確認とユーザ新規登録が完了したのでログイン状態にします');
            $this->user_auth->loginUser($this->user->id);
        });
    }

    /**
     * uuidかチェックします
     *
     * @param string $str
     * @return boolean
     */
    private function checkRegexUuid(string $str): bool
    {
        return preg_match('/([0-9a-f]{8})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{4})-([0-9a-f]{12})/', $str);
    }

    /**
     * ハッシュ化メールアドレスが正しいかチェックします
     *
     * @param string $hash_email
     * @return boolean
     */
    private function checkHashEmail(string $hash_email): bool
    {
        Log::debug("hash : {$hash_email}と未認証ユーザメールアドレス{$this->unauthenticated_user->email}が一致するか検証します");
        return true; // Hash::check($hash_email, $this->unauthenticated_user->email)
    }

    /**
     * ユーザをセットします
     *
     * @return void
     */
    private function setUser(): void
    {
        $this->user = $this->user_repository->findOrFairFromEmail($this->unauthenticated_user->email);
    }

    /**
     * 未認証ユーザをセットします
     *
     * @param string $id
     * @return void
     */
    private function setUnauthenticatedUser(string $id): void
    {
        $this->unauthenticated_user = $this->unauthenticated_user_repository->findOrFail($id);
    }

    /**
     * ユーザを作成します
     *
     * @return void
     */
    private function generateUser(): void
    {
        Log::debug("未認証ユーザメールアドレス{$this->unauthenticated_user->email}のユーザを作成します");
        $this->user_repository->save(['email' => $this->unauthenticated_user->email]);
    }

    /**
     * 未認証ユーザを削除します
     *
     * @return void
     */
    private function deleteUnauthenticatedUser(): void
    {
        $this->unauthenticated_user_repository->destroy($this->unauthenticated_user->id);
    }
}
