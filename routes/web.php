<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('user', [App\Http\Controllers\userController::class, 'index'])->middleware(['checklevel:admin'])->name('user.index');
Route::get('user/create', [App\Http\Controllers\userController::class, 'create'])->middleware(['checklevel:admin'])->name('user.create');
Route::post('post/store', [App\Http\Controllers\userController::class, 'store'])->middleware(['checklevel:admin'])->name('user.store');
Route::get('user/edit/{id}', [App\Http\Controllers\userController::class, 'edit'])->middleware(['checklevel:admin'])->name('user.edit');
Route::put('user/update/{id}', [App\Http\Controllers\userController::class, 'update'])->middleware(['checklevel:admin'])->name('user.update');
Route::get('user/show/{id}', [App\Http\Controllers\userController::class, 'show'])->middleware(['checklevel:admin'])->name('user.show');
Route::delete('user/delete/{id}', [App\Http\Controllers\userController::class, 'destroy'])->middleware(['checklevel:admin'])->name('user.delete');

Auth::routes();


Route::get('masyarakat', [App\Http\Controllers\masyarakatController::class, 'index'])->middleware(['checklevel:admin'])->name('masyarakat.index');
Route::get('masyarakat/create', [App\Http\Controllers\masyarakatController::class, 'create'])->middleware(['checklevel:admin'])->name('masyarakat.create');
Route::post('post/store', [App\Http\Controllers\masyarakatController::class, 'store'])->middleware(['checklevel:admin'])->name('masyarakat.store');
Route::get('masyarakat/edit/{id}', [App\Http\Controllers\masyarakatController::class, 'edit'])->middleware(['checklevel:admin'])->name('masyarakat.edit');
Route::put('masyarakat/update/{id}', [App\Http\Controllers\masyarakatController::class, 'update'])->middleware(['checklevel:admin'])->name('masyarakat.update');
Route::get('masyarakat/show/{id}', [App\Http\Controllers\masyarakatController::class, 'show'])->middleware(['checklevel:admin'])->name('masyarakat.show');
Route::delete('masyarakat/delete/{id}', [App\Http\Controllers\masyarakatController::class, 'destroy'])->middleware(['checklevel:admin'])->name('masyarakat.delete');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
Route::get('masyarakat/login', 'App\Http\Masyarakat\MasyarakatLoginController@showLoginForm')->name('masyarakat.login');
Route::post('masyarakat/login', 'App\Http\Masyarakat\MasyarakatLoginController@login')->name('masyarakat..post');
Route::post('masyarakat/logout', 'App\Http\Masyarakat\MasyarakatLoginController@logout')->name('masyarakat.logout');

