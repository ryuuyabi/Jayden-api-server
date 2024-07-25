<?php

namespace App\Services;

use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;
use Aws\CognitoIdentityProvider\Exception\CognitoIdentityProviderException;
use Illuminate\Support\Facades\Log;

final class Cognito
{
    private CognitoIdentityProviderClient $client_provider;
    private string $client_id;
    private string $client_secret;
    private string $user_pool_id;

    public function __construct()
    {
        $this->initialization();
        $this->client_id = config('aws.cognito_client_id');
        $this->client_secret = config('aws.cognito_client_secret');
        $this->user_pool_id = config('aws.cognito_user_pool_id');
    }

    private function initialization()
    {
        $this->client_provider = new CognitoIdentityProviderClient(
            [
                'version' => 'latest',
                'region' => config('aws.default_region'),
                'credentials' => [
                    'key' => config('aws.access_key_id'),
                    'secret' => config('aws.secret_access_id'),
                ],
            ]
        );
    }

    public function signUp(string $email, string $password)
    {
        Log::debug("cognitoユーザの登録を行います");

        try {
            $response = $this->client_provider->signUp([
                'ClientId' => $this->client_id,
                'Username' => $email,
                'Password' => $password,
                'SecretHash' => $this->generateSecretHash($email),
                'UserAttributes' => [
                    [
                        'Name' => 'email',
                        'Value' => $email,
                    ],
                ],
            ]);
            return $response;
        } catch (CognitoIdentityProviderException $e) {
            Log::error($e->getMessage());
        }
    }

    public function confirmSignUp(string $email)
    {
        Log::debug("cognitoユーザの確認を行います");

        try {
            $response = $this->client_provider->adminConfirmSignUp([
                'Username' => $email,
                'UserPoolId' =>  $this->user_pool_id
            ]);
            return $response;
        } catch (CognitoIdentityProviderException $e) {
            Log::error($e->getMessage());
        }
    }

    public function auth(string $email, string $password)
    {
        Log::debug("cognitoユーザのログインを行います");

        try {
            $response = $this->client_provider->adminInitiateAuth([
                'AuthFlow' => 'ADMIN_USER_PASSWORD_AUTH',
                'AuthParameters' => [
                    'USERNAME' => $email,
                    'PASSWORD' => $password,
                    'SECRET_HASH' => $this->generateSecretHash($email),
                ],
                'ClientId' => $this->client_id,
                'UserPoolId' => $this->user_pool_id
            ]);
            return $response;
        } catch (CognitoIdentityProviderException $e) {
            Log::error($e->getMessage());
        }
    }

    private function generateSecretHash(string $email): string
    {
        $hash = \hash_hmac('sha256', $email . $this->client_id, $this->client_secret, true);
        return \base64_encode($hash);
    }
}
