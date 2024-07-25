<?php

namespace App\Services;

use App\Exceptions\SessionTimeOutException;

final class Session
{
    public function put(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key): mixed
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function getNotNull(string $key): mixed
    {
        return $this->get($key) ?? throw new SessionTimeOutException("セッション{$key}がタイムアウトしました");
    }
}
