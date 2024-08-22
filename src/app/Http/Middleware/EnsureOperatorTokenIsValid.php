<?php

namespace App\Http\Middleware;

use App\Models\Operator;
use App\Enums\PayloadIssType;
use App\Exceptions\PayloadInvalidValueException;
use App\Repositories\IdentifierRepositoryInterface;
use App\Repositories\OperatorRepositoryInterface;
use App\Services\JwtVerify;
use Closure;
use Firebase\JWT\ExpiredException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use stdClass;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

final class EnsureOperatorTokenIsValid
{
    /**
     * @var JwtVerify service
     */
    private JwtVerify $jwt_verify;

    /**
     * @var IdentifierRepositoryInterface service
     */
    private IdentifierRepositoryInterface $identifier_repository;

    /**
     * OperatorRepositoryInterface
     *
     * @var OperatorRepositoryInterface
     */
    private OperatorRepositoryInterface $operator_repository;

    /**
     * instance
     *
     * @param JwtVerify $jwt_verify
     * @param IdentifierRepositoryInterface $identifier_repository
     * @param OperatorRepositoryInterface $operator_repository
     */
    public function __construct(JwtVerify $jwt_verify, IdentifierRepositoryInterface $identifier_repository, OperatorRepositoryInterface $operator_repository)
    {
        $this->jwt_verify = $jwt_verify;
        $this->identifier_repository = $identifier_repository;
        $this->operator_repository = $operator_repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::debug('認証の検証を開始します');

        $authorization_header = $request->header('Authorization') ?? throw new UnauthorizedHttpException('headerにAuthorizationがないです');
        $jwt = $this->getJwtFromAuthorizationHeader($authorization_header);
        Log::info("jwt: {$jwt}");

        try {
            $decoded_jwt = $this->jwt_verify->decode($jwt);
            Log::debug('jwtのデコードが成功しました');
            $this->validatePayload($decoded_jwt);
            $this->setRequestToPayload($request, $decoded_jwt->operator_sub);
        } catch (ExpiredException $e) {
            Log::info("トークンの認証時間切れです");
        } catch (PayloadInvalidValueException $e) {
            Log::info($e->getMessage());
            abort(401);
        }

        Log::debug('認証の検証が完了しました');

        return $next($request);
    }

    /**
     * AuthorizationヘッダーからBearerトークンのjwtを取得する
     *
     * @param string $authorization_header
     * @return string
     */
    private function getJwtFromAuthorizationHeader(string $authorization_header): string
    {
        return \str_replace('Bearer: ', '', $authorization_header);
    }

    /**
     * リクエスにpayloadの値を他のディレクトリ使用できるようにセットします
     *
     * @param Request $request
     * @param string $operator_sub
     * @return void
     */
    private function setRequestToPayload(Request $request, string $operator_sub)
    {
        $request->attributes->set('operator_sub', $operator_sub);
        Log::debug('リクエストにpayloadの値をセットが完了しました');
    }

    /**
     * payloadの値が正しい値か検証を行います
     *
     * @param stdClass $decoded_jwt
     * @return void
     */
    private function validatePayload(stdClass $decoded_jwt)
    {
        Log::info("operator_sub in payload: {$decoded_jwt->operator_sub}");
        /** @var Operator|null $operator */
        $operator = $this->operator_repository->findFromSub($decoded_jwt->operator_sub);
        if ($operator === null) {
            throw new PayloadInvalidValueException('payloadの管理者サブが不正値です');
        }

        Log::info("role in payload: {$decoded_jwt->role}");
        if ($operator->role !== $decoded_jwt->role) {
            throw new PayloadInvalidValueException('payloadの管理者権限が不正値です');
        }

        Log::info("iat in payload: {$decoded_jwt->iat}");
        if (Carbon::createFromTimestamp($decoded_jwt->iat, config('app.timezone'))->isFuture()) {
            throw new PayloadInvalidValueException('payloadのトークン発行時間が不正値です');
        }

        Log::info("exp in payload: {$decoded_jwt->exp}");
        if (Carbon::createFromTimestamp($decoded_jwt->exp, config('app.timezone'))->isPast()) {
            throw new PayloadInvalidValueException('payloadのトークン期限時間が不正値です');
        }

        Log::info("iss in payload: {$decoded_jwt->iss}");
        if ($decoded_jwt->iss !== PayloadIssType::OPERATOR->url()) {
            throw new PayloadInvalidValueException('payloadのサーバードメインが不正値です');
        }

        Log::info("sub in payload: {$decoded_jwt->sub}");
        if ($this->identifier_repository->getAvailableSubOfOperatorServer() !== $decoded_jwt->sub) {
            throw new PayloadInvalidValueException('payloadのサーバー識別子が不正値です');
        }

        Log::info("aud in payload: {$decoded_jwt->aud}");
        if ($this->identifier_repository->getAvailableSubOfOperatorClient() !== $decoded_jwt->aud) {
            throw new PayloadInvalidValueException('payloadのクライアント識別子が不正値です');
        }
    }
}
