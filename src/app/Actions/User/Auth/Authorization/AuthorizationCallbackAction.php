<?php

namespace App\Actions\User\Auth\Authorization;

use Illuminate\Support\Facades\Log;

final class AuthorizationCallbackAction
{
    public function __invoke(array $request_data)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
    }
}
