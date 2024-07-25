<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

final class BeforeController
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::debug("-------------------------------- LOG START --------------------------------");

        Log::debug('URL:' . url()->current());
        $params = [
            "POST" => $_POST,
            "GET" => $_GET,
            "REQUEST" => $request->all(),
            "FILES" => $_FILES,
            "COOKIES" => $_COOKIE,
        ];
        foreach ($params as $key => $row) {
            $data = $row;
            Log::debug($key . "データ：" . print_r($data, true));
        }

        return $next($request);
    }
}
