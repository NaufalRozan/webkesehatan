<?php

use App\Http\Controllers\AnakController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/anak', [App\Http\Controllers\AnakController::class, 'admin'])->name('anak');

Route::get('/anak/cari', [App\Http\Controllers\AnakController::class, 'cari']);

Route::post('/anak', [App\Http\Controllers\AnakController::class, 'create'])->name('add.anak');

Route::get('/anak/{id}/edit', [App\Http\Controllers\AnakController::class, 'edit']);

Route::post('/anak/{id}/update', [App\Http\Controllers\AnakController::class, 'update'])->name('update.anak');

Route::get('/anak/delete/{id}', [App\Http\Controllers\AnakController::class, 'delete']);

Route::get('/anak', [App\Http\Controllers\AnakController::class, 'index']);

Route::put('post/{id}/publish', [PostController::class, 'publish'])->name('post.publish');
Route::put('post/{id}/unpublish', [PostController::class, 'unpublish'])->name('post.unpublish');

Route::get('/echart', [App\Http\Controllers\EchartController::class,'eLineChart']);
Route::get('/xchart', [App\Http\Controllers\chartController::class,'xChart']);
Route::get('/achart', [App\Http\Controllers\achartController::class,'aChart']);