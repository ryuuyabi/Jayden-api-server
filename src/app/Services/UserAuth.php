<?php

namespace App\Services;

final class UserAuth
{
    public function loginUser(int $user_id): void
    {
        session()->put('user_id', $user_id);
    }

    public function getId(): int
    {
        return session()->get('user_id') ?? abort(404);
    }

    public function getIdArray(): array
    {
        return ['user_id', $this->getId()];
    }
}
