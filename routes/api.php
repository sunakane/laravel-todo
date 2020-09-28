<?php

use App\Http\Controllers\TestController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('test', [TestController::class, 'test']);

Route::post('todos/create', [\App\Http\Controllers\TodoController::class, 'create']);;
Route::get('todos', [\App\Http\Controllers\TodoController::class, 'all']);
Route::post('todos/update', [\App\Http\Controllers\TodoController::class, 'update']);
Route::delete('todos/delete', [\App\Http\Controllers\TodoController::class, 'delete']);
Route::post('todos/complete', [\App\Http\Controllers\TodoController::class, 'toggleComplete']);
