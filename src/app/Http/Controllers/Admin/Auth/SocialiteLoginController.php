<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Log;

final class SocialiteLoginController extends BaseController
{
    public function store(int $social_id)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
        Log::debug("ソーシャルログイン認証を行います");
    }
}
