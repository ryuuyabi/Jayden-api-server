<?php

use App\Exceptions\PayloadInvalidValueException;
use App\Exceptions\ValidationException;
use App\Http\Middleware\BeforeController;
use App\Http\Middleware\CorsSetting;
use Firebase\JWT\ExpiredException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__ . '/../routes/console.php',
        using: function () {
            Route::domain(config('jayden.domain.user'))
                ->middleware(['api'])
                ->group(base_path('routes/user.php'));
            Route::domain(config('jayden.domain.admin'))
                ->middleware(['api'])
                ->group(base_path('routes/admin.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->use([
            BeforeController::class,
            // SessionSetting::class,
            CorsSetting::class,
            \Illuminate\Http\Middleware\TrustProxies::class,
            \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class,
            \Illuminate\Http\Middleware\ValidatePostSize::class,
            \Illuminate\Foundation\Http\Middleware\TrimStrings::class,
            \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        ]);
        $middleware->group('web', [
            \Illuminate\Cookie\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);
        $middleware->group('api', [
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->respond(function (Response $response) use ($exceptions) {
            $status_code = match (true) {
                // 401
                $exceptions instanceof ExpiredException                 => Response::HTTP_UNAUTHORIZED,
                $exceptions instanceof PayloadInvalidValueException     => Response::HTTP_UNAUTHORIZED,
                // 404
                $exceptions instanceof ModelNotFoundException           => Response::HTTP_NOT_FOUND,
                $exceptions instanceof Exception                        => Response::HTTP_INTERNAL_SERVER_ERROR,
                // 422
                $exceptions instanceof ValidationException              => Response::HTTP_UNPROCESSABLE_ENTITY,
                default => $response->getStatusCode()
            };

            // 正常ステータスコード以上の数字で実行
            if ($status_code > 299) {
                $message = match ($status_code) {
                    Response::HTTP_UNAUTHORIZED                         => 'アクセス権限がありません',
                    Response::HTTP_FORBIDDEN                            => '閲覧権限がありません',
                    Response::HTTP_NOT_FOUND                            => 'ページが見つかりませんでした',
                    Response::HTTP_METHOD_NOT_ALLOWED                   => 'クライアント側にメソッドが許可されていません',
                    Response::HTTP_REQUEST_ENTITY_TOO_LARGE             => 'ファイル容量の上限を超えています',
                    Response::HTTP_TOO_MANY_REQUESTS                    => 'リクエストが大量に送信されました',
                    Response::HTTP_INTERNAL_SERVER_ERROR                => 'サーバー内でエラーが起きました',
                    Response::HTTP_BAD_GATEWAY                          => '不正なリクエストを受けました',
                    Response::HTTP_LOOP_DETECTED                        => '無限ループが起きました',
                };
                $response = response()->json([
                    'status' => $status_code,
                    'message' => $message
                ], $status_code);
                Log::debug($response);
                return $response;
            }
            return $response;
        });
    })->create();
