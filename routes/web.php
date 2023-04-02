<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Usercontroller;
// use App\Http\Controllers\Postcontroller;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/user/show/{id}',[App\Http\Controllers\UserController::class, 'show'])->name('user.show');

Route::get('/user/edit/{id}',[App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');

Route::put('/user/update/{id}',[App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::delete('/user/delete/{id}',[App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

Route::get('/post/list',[App\Http\Controllers\PostController::class, 'index'])->name('post.list');

Route::get('/post/show/{id}',[App\Http\Controllers\PostController::class, 'show'])->name('post.show');

Route::get('/post/create',[App\Http\Controllers\PostController::class, 'create'])->name('post.create');

Route::post('/post/store',[App\Http\Controllers\PostController::class, 'store'])->name('post.store');

Route::get('/post/edit/{id}',[App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');

Route::put('/post/update/{id}',[App\Http\Controllers\PostController::class, 'update'])->name('post.update');

Route::delete('/post/delete/{id}',[App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');