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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [\App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\API\AuthController::class, 'login']);

Route::get('/post', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/post/{id}', [\App\Http\Controllers\PostController::class, 'show']);
Route::post('/post', [\App\Http\Controllers\PostController::class, 'store']);
Route::put('/post/{post}', [\App\Http\Controllers\PostController::class, 'update']);
Route::delete('/post/{post}', [\App\Http\Controllers\PostController::class, 'destroy']);


// Route::controller(\App\Http\Controllers\PostController::class)->group(function () {
//     Route::get('/post', 'index');
//     Route::get('/post/{id}', 'show');
//     Route::post('/post', 'store');
//     Route::put('/post/{id}', 'update');
//     Route::delete('/post/{id}', 'destroy');
// });
