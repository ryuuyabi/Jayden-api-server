<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\SocialiteLoginController;
use App\Http\Controllers\Admin\MailMagazineController;
use App\Http\Controllers\Admin\MasterMaintenance\DistrictController;
use App\Http\Controllers\Admin\MasterMaintenance\LocalFoodController;
use App\Http\Controllers\Admin\MasterMaintenance\PrefectureController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OperatorApplyController;
use App\Http\Controllers\Admin\OperatorController;
use App\Http\Controllers\Admin\TopController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CsrfController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {
    Route::get('/csrf-token', CsrfController::class)->name('csrf-token');
    Route::prefix('/api')->name('api.')->group(function () {
        // 認証系
        Route::prefix('/auth')->name('auth.')->group(function () {
            Route::prefix('/register')->name('register.')->controller(RegisterController::class)->group(function () {
                Route::post('/store', 'store')->name('store');
            });
            Route::prefix('/login')->name('login.')->controller(LoginController::class)->group(function () {
                Route::post('/store', 'store')->name('store');
            });
            Route::prefix('/social/{social_id}/login')->controller(SocialiteLoginController::class)->name('social.login')->group(function () {
                Route::post('/store', 'store')->name('store');
            });
            Route::prefix('/logout')->name('logout.')->controller(LogoutController::class)->group(function () {
                Route::post('/store', 'store')->name('store');
            });
        });
        // コンテンツ
        Route::middleware(['ensure_operator_token_is_valid'])->group(function () {
            Route::prefix('/top')->name('top.')->controller(TopController::class)->group(function () {
                Route::get('/', 'index')->name('index');
            });
            Route::prefix('/me')->name('me.')->group(function () {
                Route::get('/', 'index')->name('index');
            });
            Route::prefix('/user')->name('user.')->controller(UserController::class)->group(function () {
                Route::get('/', 'index')->name('index');
            });
            Route::prefix('/operator')->name('operator')->controller(OperatorController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::get('/{operator_id}', 'show')->name('show');
                Route::prefix('/apply')->name('apply.')->controller(OperatorApplyController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                });
            });
            Route::prefix('/news')->name('news.')->controller(NewsController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::get('/{news_id}', 'show')->name('show');
            });
            Route::prefix('/mail-magazine')->name('mail-magazine.')->controller(MailMagazineController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
            });
            Route::prefix('/master_maintenance')->name('master_maintenance.')->group(function () {
                Route::prefix('/prefecture')->name('prefecture.')->controller(PrefectureController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/{prefecture_id}', 'show')->name('show');
                    Route::post('/{prefecture_id}', 'update')->name('update');
                });
                Route::prefix('/district')->name('district.')->controller(DistrictController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{district_id}', 'show')->name('show');
                    Route::post('/{district_id}', 'update')->name('update');
                    Route::post('/delete', 'destroy')->name('destroy');
                });
                Route::prefix('/local_food')->name('local_food.')->controller(LocalFoodController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{district_id}', 'show')->name('show');
                    Route::post('/{district_id}', 'update')->name('update');
                    Route::post('/delete', 'destroy')->name('destroy');
                });
            });
        });
    });
});
