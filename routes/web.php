<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/api/whatsup', function() {
    return response()->json([
        'status' => false,
        'message' => ':P'
    ], 404);
});

Route::get('/{any}', function () {
    return view('layouts.app');
})->where('any', '^(?!api).*$');
// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/test', function(Request $request) {
//     return $request->bearerToken();
// });
// Route::resource('user', UsersController::class);

// Route::controller(PostController::class)->group(function () {
// });

// Route::prefix('articles')->group(function(){
//     Route::get('/list', function() {
//         return view('posts.index');
//     });
//     Route::get('/post/{url}', [PostController::class, 'show']);
//     Route::get('/post/{url}/edit', [PostController::class, 'edit'])->middleware('auth:sanctum');
//     Route::put('/post/{url}/edit', [PostController::class, 'update'])->middleware('auth:sanctum');
//     Route::get('/create', [PostController::class, 'create'])->middleware('auth:sanctum');
//     Route::post('/create', [PostController::class, 'store'])->middleware('auth:sanctum');
// });

// Route::controller(LoginController::class)->group( function() {
//     Route::prefix('login')->group( function() {
//         Route::get('/', 'index')->name('login');
//         Route::post('/', 'authenticate');
//     });
// });
// Route::controller(RegisterController::class)->group(function() {
//     Route::prefix('register')->group(function(){
//         Route::get('/', 'index');
//         Route::post('/', 'register');
//     });
// });
// Route::get('/logout', [LoginController::class, 'logout']);