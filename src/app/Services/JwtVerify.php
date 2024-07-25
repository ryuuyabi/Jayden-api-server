<?php

namespace App\Services;

use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use stdClass;

final class JwtVerify
{
    private string $key;
    private string $alg;

    public function __construct()
    {
        $this->key = 'local';
        $this->alg = 'HS256';
    }

    public function encode(array $payload): string
    {
        return JWT::encode($payload, $this->key, $this->alg);
    }

    public function decode(string $jwt): stdClass
    {
        try {
            return JWT::decode($jwt, new Key($this->key, $this->alg));
        } catch (ExpiredException $e) {
            throw $e;
        }
    }
}
