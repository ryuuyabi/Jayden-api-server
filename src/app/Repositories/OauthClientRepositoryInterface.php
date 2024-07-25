<?php

namespace App\Repositories;

interface OauthClientRepositoryInterface
{
    public function canOauthClient(int $id): bool;
}
