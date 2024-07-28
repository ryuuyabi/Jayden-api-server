<?php

namespace App\Actions\Admin\Auth\Login;

use App\Enums\PayloadIssType;
use App\Enums\TokenTime;
use App\Models\Operator;
use App\Repositories\AccountRepositoryInterface;
use App\Repositories\IdentifierRepositoryInterface;
use App\Repositories\OperatorRepositoryInterface;
use App\Services\AwsJwtVerify;
use App\Services\Cognito;
use App\Services\JwtVerify;
use Illuminate\Support\Facades\Log;

final class LoginStoreAction
{
    /**
     * @var Cognito service
     */
    private Cognito $cognito;

    /**
     * @var JwtVerify service
     */
    private JwtVerify $jwt_verify;

    /**
     * @var AwsJwtVerify service
     */
    private AwsJwtVerify $aws_jwt_verify;

    /**
     * @var AccountRepositoryInterface repository
     */
    private AccountRepositoryInterface $account_repository;

    /**
     * @var OperatorRepositoryInterface repository
     */
    private OperatorRepositoryInterface $operator_repository;

    /**
     * @var IdentifierRepositoryInterface repository
     */
    private IdentifierRepositoryInterface $identifier_repository;

    /**
     * instance
     *
     * @param Cognito $cognito
     * @param JwtVerify $jwt_verify
     * @param AwsJwtVerify $aws_jwt_verify
     * @param OperatorRepositoryInterface $operator_repository
     * @param AccountRepositoryInterface $account_repository
     * @param IdentifierRepositoryInterface $identifier_repository
     */
    public function __construct(
        Cognito $cognito,
        JwtVerify $jwt_verify,
        AwsJwtVerify $aws_jwt_verify,
        OperatorRepositoryInterface $operator_repository,
        AccountRepositoryInterface $account_repository,
        IdentifierRepositoryInterface $identifier_repository,
    ) {
        $this->cognito = $cognito;
        $this->jwt_verify = $jwt_verify;
        $this->aws_jwt_verify = $aws_jwt_verify;
        $this->account_repository = $account_repository;
        $this->operator_repository = $operator_repository;
        $this->identifier_repository = $identifier_repository;
    }

    /**
     * 管理者のログインを行います
     *
     * @param array<string, mixed> $validate_data
     * @return array<string, string>
     */
    public function __invoke(array $validate_data): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $cognito_id_token = $this->getCognitoIdToken($validate_data['email'], $validate_data['password']);
        $cognito_id_token_decoded = $this->aws_jwt_verify->decode($cognito_id_token);
        Log::debug('cognitoから受け取ったid_tokenをデコードしました');

        Log::info("sub   : {$cognito_id_token_decoded->sub}");
        Log::info("email : {$cognito_id_token_decoded->email}");

        $account = $this->account_repository->getAccountFromSubAndUsername($cognito_id_token_decoded->sub, $cognito_id_token_decoded->email);
        Log::info("アカウント{$account->id}を取得しました");

        $operator = $this->operator_repository->findOrFail($account->operator_id);
        Log::info("アカウント{$account->id}と連携している管理者{$operator->id}を取得しました");

        $jwt = $this->jwt_verify->encode($this->createJwtPayload($operator));
        Log::info("jwt: {$jwt}をクライアントに送信します");
        return ['jwt' => $jwt, 'redirect_uri_path' => '/top'];
    }

    /**
     * cognitoからIDトークンを取得します
     *
     * @param string $email
     * @param string $password
     * @return string
     */
    private function getCognitoIdToken(string $email, string $password): string
    {
        $cognito_auth_result = $this->cognito->auth($email, $password);
        $cognito_id_token = $cognito_auth_result->toArray()['AuthenticationResult']['IdToken'];
        Log::debug("cognitoの認証が完了してid_tokenを受け取りました");
        Log::info("id_token :$cognito_id_token");
        return $cognito_id_token;
    }

    /**
     * jwtでクライアントに受け渡すpayloadの値を作成します
     *
     * @param Operator $operator
     * @return array<string, float|int|string|null>
     */
    private function createJwtPayload(Operator $operator): array
    {
        return [
            'operator_sub' => $operator->sub,
            'role' => $operator->role,
            'nickname' => $operator->nickname,
            'iat' => now()->timestamp,
            'exp' => TokenTime::OPERATOR_ACCESS->getDeadlineUnixTime(),
            'iss' => PayloadIssType::OPERATOR->url(),
            'sub' => $this->identifier_repository->getAvailableSubOfOperatorServer(),
            'aud' => $this->identifier_repository->getAvailableSubOfOperatorClient(),
        ];
    }
}
