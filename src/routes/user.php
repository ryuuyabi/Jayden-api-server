<?php

use App\Http\Controllers\CsrfController;
use App\Http\Controllers\User\Auth\AuthorizationController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\LogoutController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\Auth\TokenController;
use App\Http\Controllers\User\AuthUserController;
use App\Http\Controllers\User\CookingController;
use App\Http\Controllers\User\NewsController;
use App\Http\Controllers\User\NotifyController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Middleware\AuthUserVerification;
use Illuminate\Support\Facades\Route;

Route::prefix('/user')->name('user.')->group(function () {
    Route::get('/csrf-token', CsrfController::class)->name('csrf-token');
    Route::prefix('/api')->name('api.')->group(function () {
        // 認証系
        Route::prefix('/oauth')->name('oauth.')->group(function () {
            Route::prefix('/token')->name('token.')->controller(TokenController::class)->group(function () {
                Route::get('/access', 'access')->name('access');
                Route::get('/refresh', 'refresh')->name('refresh');
            });
            Route::prefix('/authorization')->name('authorization.')->controller(AuthorizationController::class)->group(function () {
                Route::get('/redirect', 'redirect')->name('redirect');
                Route::get('/callback', 'callback')->name('callback');
                Route::get('/authorize', 'authorize')->name('authorize');
            });
            Route::prefix('/login')->controller(LoginController::class)->name('login.')->group(function () {
                Route::post('/store', 'store')->name('store');
            });
            Route::prefix('/register')->controller(RegisterController::class)->name('register.')->group(function () {
                Route::post('/store', 'store')->name('store');
                Route::get('/email/verification/{id}/{hash}', 'emailVerification')->name('email_verification');
            });
            Route::prefix('/logout')->name('.logout')->controller(LogoutController::class)->group(function () {
                Route::get('/', 'destroy')->name('destroy');
            });
        });
        Route::middleware(AuthUserVerification::class)->group(function () {
            // ログインユーザ
            Route::get('/auth/user', AuthUserController::class)->name('auth.user');
            // コンテンツ
            Route::prefix('/user_profile')->name('user_profile.')->controller(UserProfileController::class)->group(function () {
                Route::post('/store')->name('store');
                Route::post('/update')->name('update');
                Route::get('/{user_profile_id}')->where('user_profile_id', '[0-9]+')->name('show');
            });
            Route::prefix('/news')->name('news.')->controller(NewsController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/all', 'all')->name('all');
                Route::get('/{news_id}', 'show')->where('news_id', '[0-9]+')->name('show');
            });
            // 料理
            Route::prefix('/cooking')->name('.cooking')->controller(CookingController::class)->group(function () {
                Route::get('/', 'index')->name('index');
            });
            // 通知
            Route::prefix('/notify')->name('.notify')->controller(NotifyController::class)->group(function () {
                Route::get('/', 'index')->name('index');
            });
        });
    });
});
