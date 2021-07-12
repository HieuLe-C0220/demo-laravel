<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticleController;

use App\Http\Controllers\ResourceController;

use App\Http\Controllers\Resource2Controller;

use App\Http\Controllers\PostController;
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

// Route::get('/welcome', ['App\Http\Controllers\ArticleController', 'show']);
Route::get('/welcome', [ArticleController::class, 'show']);
Route::get('/edit', [ArticleController::class, 'edit']);
Route::get('/edit/{id}', [ArticleController::class, 'edit']);

Route::resource('/article', ResourceController::class);
Route::group(['prefix' => '/admin'],function(){
    Route::get('/abc', function(){
        return 'abc';
    });
    Route::get('/xyz', function(){
        return 'xyz';
    });
});

Route::resource('/article2', Resource2Controller::class);

Route::resource('/post', PostController::class);