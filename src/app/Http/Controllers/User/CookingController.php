<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Cooking\CookingIndexAction;
use App\Actions\User\Cooking\CookingStoreAction;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Log;

final class CookingController extends BaseController
{
    public function index(CookingIndexAction $action)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
    }

    public function store(CookingStoreAction $action)
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
    }
}
