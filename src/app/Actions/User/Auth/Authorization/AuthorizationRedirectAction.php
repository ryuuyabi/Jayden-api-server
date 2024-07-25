<?php

namespace App\Actions\User\Auth\Authorization;

use App\Services\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

use function base64_encode;
use function hash;
use function rtrim;
use function strtr;

final class AuthorizationRedirectAction
{
    private const STATE_LENGTH = 40;
    private const CODE_VERIFIER_LENGTH = 120;

    /**
     * @var Session service
     */
    private Session $session;

    private readonly string $client_id;
    private readonly string $redirect_uri;
    private readonly string $response_type;
    private readonly string $code_challenge_method;

    public function __construct()
    {
        $this->session = new Session();
        $this->client_id = config('oauth_client.client_id');
        $this->redirect_uri = route('user.api.oauth.authorization.callback');
        $this->response_type = 'code';
        $this->code_challenge_method = 'S256';
    }

    public function __invoke()
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $this->session->put('state', $state = Str::random(self::STATE_LENGTH));
        $this->session->put('code_challenge', $code_challenge = $this->createCodeChallenge(Str::random(self::CODE_VERIFIER_LENGTH)));

        return $this->createAuthorizeRequestUrl($state, $code_challenge);
    }

    private function createCodeChallenge(string $code_verifier)
    {
        return strtr(rtrim(base64_encode(hash('sha256', $code_verifier, true)), '='), '+/', '-_');
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
}
