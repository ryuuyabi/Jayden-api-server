<?php

namespace App\Repositories;

use App\Models\OauthClient;
use Illuminate\Support\Facades\Log;

final class OauthClientRepository implements OauthClientRepositoryInterface
{
    private OauthClient $model;

    public function __construct()
    {
        $this->model = new OauthClient();
    }

    public function canOauthClient(int $id): bool
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        return $this->model->find($id) ? true : false;
    }
}
