<?php

namespace App\Actions\User\Auth\Authorization;

use App\Repositories\OauthClientRepositoryInterface;
use App\Services\Session;
use Illuminate\Support\Facades\Log;

final class AuthorizationAuthorizeAction
{
    /**
     * @var Session service
     */
    private Session $session;

    /**
     * @var OauthClientRepositoryInterface repository
     */
    private OauthClientRepositoryInterface $oauth_client_repository;

    public function __construct(OauthClientRepositoryInterface $oauth_client_repository)
    {
        $this->session = new Session();
        $this->oauth_client_repository = $oauth_client_repository;
    }

    public function __invoke(array $request_data): string
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $this->validateAuthorizationRequest($request_data);

        return '';
    }

    private function createAuthorizeRequestUrl(string $state, string $code_challenge): string
    {
        $query = [
            'client_id' => $this->client_id,
            'redirect_uri' => $this->redirect_uri,
            'response_type' => $this->response_type,
            'state' => $state,
            'code_challenge' => $code_challenge,
            'code_challenge_method' => $this->code_challenge_method
        ];
        return route('user.api.oauth.authorization.authorize', $query);
    }

    private function validateAuthorizationRequest(array $request_data)
    {
        $this->validateClientId($request_data['client_id']);
        $this->validateRedirectUri($request_data['redirect_uri']);
        $this->validateResponseType($request_data['response_type']);
        $this->validateCodeChallengeMethod($request_data['code_challenge_method']);
    }

    private function validateClientId(int $id): bool
    {
        return $this->oauth_client_repository->canOauthClient($id);
    }

    private function validateRedirectUri(string $redirect_uri): bool
    {
        return $redirect_uri === route('user.api.oauth.authorization.callback') ? true : false;
    }

    private function validateResponseType(string $response_type): bool
    {
        return $response_type === 'code' ? true : false;
    }

    private function validateCodeChallengeMethod(string $code_challenge_method): bool
    {
        return $code_challenge_method === 'S256' ? true : false;
    }
}
