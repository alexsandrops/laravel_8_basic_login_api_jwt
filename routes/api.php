<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'api',
    // 'prefix' => 'auth'

], function ($router) {

    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::post('/refresh', [App\Http\Controllers\AuthController::class, 'refresh'])->name('refresh');
    Route::post('/me', [App\Http\Controllers\AuthController::class, 'me'])->name('me');

    Route::post('/produto/store', [App\Http\Controllers\API\ProdutoController::class, 'store'])->name('produtos.store');

});

// Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
