<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

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

Route::get('admin/login', function () {
    return view('admin/login', ['title' => "Login | " . config('web-config.webname')]);
})->name('admin.login');
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::group(['prefix' => 'admin',  'middleware' => 'adminauth'], function () {
    Route::get('/', function () {
        return view('admin/dashboard', ['title' => "Dashboard | " . config('web-config.webname')]);
    })->name('admin.dashboard');
    //Admin
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::put('admin/update', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('admin/delete', [AdminController::class, 'delete'])->name('admin.delete');
    Route::post('admin/data', [AdminController::class, 'data'])->name('admin.data');
    //User
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::post('user/create', [UserController::class, 'create'])->name('user.create');
    Route::put('user/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/delete', [UserController::class, 'delete'])->name('user.delete');
    Route::post('user/data', [UserController::class, 'data'])->name('user.data');
    //Comment
    Route::get('comment', [CommentController::class, 'index'])->name('comment.index');
    Route::post('comment/create', [CommentController::class, 'create'])->name('comment.create');
    Route::put('comment/update', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('comment/delete', [CommentController::class, 'delete'])->name('comment.delete');
    Route::post('comment/data', [CommentController::class, 'data'])->name('comment.data');
});
