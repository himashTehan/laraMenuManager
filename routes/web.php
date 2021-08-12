<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Menu\CategoryController;
use App\Http\Controllers\Menu\MenuController;
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

Route::prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('/users', UsersController::class)->name('*', 'users');
});  

Route::prefix('manage')->name('menu.')->middleware(['auth','can:manage-menus'])->group(function () {
    Route::resource('/menus', MenuController::class)->name('*', 'menus');
    Route::resource('/category', CategoryController::class)->name('*', 'category');
}); 


