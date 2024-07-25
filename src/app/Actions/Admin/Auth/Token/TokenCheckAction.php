<?php

namespace App\Actions\Admin\Auth\Token;

use Illuminate\Support\Facades\Log;

final class TokenCheckAction
{
    public function __invoke(array $validate_data): array
    {
        Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');

        $access_token = $validate_data['access_token'];
        Log::debug("検証を行うアクセストークン{$access_token}");

        return [];
    }
}
