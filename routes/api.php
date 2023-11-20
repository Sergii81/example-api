<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PwaController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WhitepageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('v1')->group(function () {
    Route::controller(DomainController::class)->prefix('domains')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'create');
        Route::delete('/{domain}', 'delete');
        Route::patch('/{domain}', 'update');
        Route::get('/get-active', 'getActive');
    });
    Route::controller(PwaController::class)->prefix('pwa')->group(function () {
        Route::get('/', 'index');
        Route::get('/{pwa}', 'show');
        Route::post('/', 'create');
        Route::patch('/{pwa}', 'update');
        Route::get('/getBuyerPwa/{buyer}', 'getBuyerPwa');
    });
    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('/', 'index');
        Route::get('/{user}', 'show');
        Route::post('/', 'create');
        Route::patch('/{user}', 'update');
    });
    Route::controller(SettingController::class)->prefix('setting')->group(function () {
        Route::get('/{setting}', 'show');
        Route::patch('/{setting}', 'update');
    });
    Route::controller(WhitepageController::class)->prefix('whitepages')->group(function () {
        Route::get('/', 'index');
    });
    Route::controller(TemplateController::class)->prefix('templates')->group(function () {
        Route::get('/', 'index');
    });
    Route::controller(LanguageController::class)->prefix('languages')->group(function () {
        Route::get('/getByTemplate', 'getByTemplate');
    });
    Route::controller(ReviewController::class)->prefix('reviews')->group(function () {
        Route::post('/', 'create');
        Route::patch('/{review}', 'update');
        Route::delete('/delete/{review}', 'delete');
    });
});

