<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\MailMagazine\MailMagazineStoreAction;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\MailMagazine\MailMagazineStoreRequest;
use Illuminate\Support\Facades\Log;

final class MailMagazineController extends BaseController
{
    public function index(): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
    }

    public function store(MailMagazineStoreRequest $request, MailMagazineStoreAction $action): void
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $action($request->validated());
    }
}
