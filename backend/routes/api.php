<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/stock', [StockController::class, 'index']);

Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);       // 使用者註冊
    Route::post('/login', [AuthController::class, 'login']);          // 使用者登入 (回傳 JWT token 及使用者資訊)
    Route::get('/profile', [AuthController::class, 'userProfile']);    // 以 JWT token 取得使用者資訊
    Route::post('/refresh', [AuthController::class, 'refresh']);        // 更新 JWT token
    Route::post('/logout', [AuthController::class, 'logout']);         // 使用者登出，移除 JWT token
});
