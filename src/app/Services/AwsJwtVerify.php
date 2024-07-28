<?php

namespace App\Services;

use Firebase\JWT\JWK;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Http;

final class AwsJwtVerify
{
    /**
     * jwtをデコードします
     *
     * @param string $jwt
     * @return object
     */
    public function decode(string $jwt)
    {
        $jwks = $this->fetchJWKs();
        $kid = $this->getKid($jwt);
        $jwk = $this->getJwk($jwks, $kid);
        return JWT::decode($jwt, $jwk);
    }

    /**
     * jwtからkidを取得します
     *
     * @param string $jwt
     * @return string
     */
    public function getKid(string $jwt): string
    {
        $head = \json_decode(JWT::urlsafeB64Decode(\explode('.', $jwt)[0]), true);
        return $head['kid'];
    }

    /**
     * jwksからkidを用いて使用するjwkを取得します
     *
     * @param array $jwks
     * @param string $kid
     * @return Key
     */
    public function getJwk(array $jwks, string $kid)
    {
        return JWK::parseKeySet($jwks)[$kid];
    }

    /**
     * awsからjwksを取得します
     *
     * @return array
     */
    private function fetchJWKs(): array
    {
        $region = config('aws.default_region');
        $user_pool_id = config('aws.cognito_user_pool_id');
        $response = Http::get("https://cognito-idp.{$region}.amazonaws.com/{$user_pool_id}/.well-known/jwks.json");
        return \json_decode($response->getBody()->getContents(), true) ?: [];
    }
}
