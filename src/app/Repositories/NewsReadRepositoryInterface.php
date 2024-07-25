<?php

namespace App\Repositories;

interface NewsReadRepositoryInterface
{
    public function save(array $store_data): void;
    public function isReadNews(int $news_id, int $user_id): bool;
}
