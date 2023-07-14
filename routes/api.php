<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Resources\PostResource;
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

Route::get('/hello', function(){
    return "HELLO";
});
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/user', function(Request $request) {
        return "PNE";
    });
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/test', function() {
        return "TEsT";
    });
});
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::resource('posts', PostResource::class);
Route::controller(PostController::class)->group(function() {
    Route::prefix('post')->group(function () {
        Route::get('/{url}', 'get');
        Route::get('/{url}/comments', [CommentController::class, 'get']);

        Route::group(['middleware' => ['auth:sanctum']], function () {
            Route::post('/', 'store');
            Route::put('/{url}/edit', 'update');
            Route::post('/{url}/comment/add', [CommentController::class, 'store']);
            Route::delete('/{url}/delete', 'remove');
            Route::delete('/{url}/comment/', [CommentController::class, 'delete']);
        });
    });
    Route::prefix('posts')->group(function () {
        Route::get('/', 'getAll');
    });
});

// });