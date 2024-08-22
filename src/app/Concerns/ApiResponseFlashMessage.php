<?php

namespace App\Concerns;

trait ApiResponseFlashMessage
{
    /**
     * TOP画面
     *
     * @return string|null
     */
    private function getTopIndexMessage(): string|null
    {
        return url()->previous() === route('admin.api.auth.login.store') ? 'ログインに成功しました' : null;
    }
}
