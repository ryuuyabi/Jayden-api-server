<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface NewsRepositoryInterface
{
    public function getNewsListArrayForUserSide(): LengthAwarePaginator;
    public function getNewsListLimitFiveArray(): Collection;
    public function getNewsListArrayForOperatorTop(): Collection;
    public function findOrFail(int $id): Model;
}
