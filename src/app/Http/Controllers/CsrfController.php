<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;

final class CsrfController extends BaseController
{
    public function __invoke()
    {
        return response()->json(csrf_token());
    }
}
