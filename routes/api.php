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

Route::name('posts.')->prefix('v1/postagens')->group(function () {

    Route::get('listar', [\App\Http\Controllers\Api\PostsController::class, 'index'])->name('index');

    Route::get('exibir/{id}', [\App\Http\Controllers\Api\PostsController::class, 'show'])->name('show');

});

Route::name('coments.')->prefix('v1/comentarios')->group(function () {

    Route::get('listar', [\App\Http\Controllers\Api\ComentsController::class, 'index'])->name('index');

    Route::get('exibir/{id}', [\App\Http\Controllers\Api\ComentsController::class, 'show'])->name('show');

});

Route::group([
    'middleware' => ['jwt.verify'],
    'prefix' => 'v1'
], function ($router) {

    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('login');

    Route::post('logout', [\App\Http\Controllers\Api\AuthController::class, 'logout'])->name('logout');

    Route::post('refresh', [\App\Http\Controllers\Api\AuthController::class, 'refresh'])->name('refresh');

    Route::post('me', [\App\Http\Controllers\Api\AuthController::class, 'me'])->name('me');

    Route::post('respondWithToken', [\App\Http\Controllers\AuthController::class, 'respondWithToken'])->name('respondWithToken');

    Route::name('posts.')->prefix('postagens')->group(function () {

    Route::post('cadastrar', [\App\Http\Controllers\Api\PostsController::class, 'store'])->name('store');

    Route::put('atualizar/{id}', [\App\Http\Controllers\Api\PostsController::class, 'update'])->name('update');

    Route::delete('deletar/{id}', [\App\Http\Controllers\Api\PostsController::class, 'destroy'])->name('destroy');

    });

    Route::name('coments.')->prefix('comentarios')->group(function () {

        Route::post('cadastrar', [\App\Http\Controllers\Api\ComentsController::class, 'store'])->name('store');

        Route::put('atualizar/{id}', [\App\Http\Controllers\Api\ComentsController::class, 'update'])->name('update');

        Route::delete('deletar/{id}', [\App\Http\Controllers\Api\ComentsController::class, 'destroy'])->name('destroy');

        });

});
