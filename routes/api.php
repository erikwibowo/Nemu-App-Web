<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::resource('/user', UserController::class);
// Route::resource('/post', PostController::class);

//User
Route::post('user/auth', [Usercontroller::class, 'auth'])->name("api.user.auth");
Route::get('user', [Usercontroller::class, 'index'])->name("api.user.index");
Route::post('user/{id}', [Usercontroller::class, 'store'])->name("api.user.show");
Route::put('user/{id}', [Usercontroller::class, 'update'])->name("api.user.update");
Route::delete('user/{id}', [Usercontroller::class, 'delete'])->name("api.user.delete");
