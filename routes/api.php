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

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::group([

    'middleware' => 'auth:api',
    // 'prefix' => 'auth'

], function ($router) {

    //Login
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::post('/refresh', [App\Http\Controllers\AuthController::class, 'refresh'])->name('refresh');
    Route::post('/me', [App\Http\Controllers\AuthController::class, 'me'])->name('me');
    
    
    //Produto
    Route::get('/produtos', [App\Http\Controllers\API\ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('/produtos/show/{id}', [App\Http\Controllers\API\ProdutoController::class, 'show'])->name('produtos.show');
    Route::post('/produto/store', [App\Http\Controllers\API\ProdutoController::class, 'store'])->name('produtos.store');
    Route::put('/produtos/update/{id}', [App\Http\Controllers\API\ProdutoController::class, 'update'])->name('produtos.update');
    Route::delete('/produtos/delete/{id}', [App\Http\Controllers\API\ProdutoController::class, 'destroy'])->name('produtos.destroy');


    //Categoria
    Route::get('/categorias', [App\Http\Controllers\API\CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/show/{id}', [App\Http\Controllers\API\CategoriaController::class, 'show'])->name('categorias.show');
    Route::post('/categorias/store', [App\Http\Controllers\API\CategoriaController::class, 'store'])->name('categorias.store');
    Route::put('/categorias/update/{id}', [App\Http\Controllers\API\CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/delete/{id}', [App\Http\Controllers\API\CategoriaController::class, 'destroy'])->name('categorias.destroy');
    
});

// Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
