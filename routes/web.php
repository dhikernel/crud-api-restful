<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\ClientsController;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/painel', function () {
    return view('dashboard');
})->name('painel');

Route::group(['middleware' => 'auth'], function () {

    // Route::resource('posts', \App\Http\Controllers\PostsController::class);

    Route::name('posts.')->prefix('posts')->group(function () {

        Route::get('/', [PostsController::class, 'index'])->name('index');

        Route::get('/cadastrar', [PostsController::class, 'create'])->name('create');

        Route::post('/cadastrar', [PostsController::class, 'store'])->name('store');

        Route::get('/{post}', [PostsController::class, 'show'])->name('show');

        Route::get('/{post}/editar', [PostsController::class, 'edit'])->name('edit');

        Route::put('/{post}/update', [PostsController::class, 'update'])->name('update');

        Route::get('/{post}/status', [PostsController::class, 'status'])->name('status');

        Route::delete('/{post}', [PostsController::class, 'destroy'])->name('destroy');

        });


    // Route::name('clientes.')->prefix('clientes')->group(function () {

    // Route::get('/', [ClientsController::class, 'index'])->name('index');

    // Route::get('/{id}', [ClientsController::class, 'show'])->name('show');

    // Route::get('/{id}/edit', \App\Http\Controllers\Api\ClientEditController::class)->name('edit');

    // Route::put('/{id}/update', [ClientsController::class, 'update'])->name('update');

    // Route::get('/{id}/toogle', [ClientsController::class, 'toogle'])->name('toogle');

    // Route::delete('/{id}', [ClientsController::class, 'destroy'])->name('destroy');

    // });

    Route::resource('users', \App\Http\Controllers\UsersController::class);

});

// require_once __DIR__ . '/fortify.php';


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
