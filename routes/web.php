<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CanDeleteModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard.index');
})->name('dashboard.index')->middleware('auth');


Route::get('login', [AuthController::class, 'loginForm'])->name('login.form')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->name('login.submit')->middleware('guest');


Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::group([
    'middleware' => 'auth:web',
    'prefix' => 'categories',
    'as' => 'categories.',
    'controller' => CategoryController::class
], static function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{category_id}', 'show')->name('show');
    Route::post('/', 'store')->name('store');
    Route::get('/{category}/edit', 'edit')->name('edit');
    Route::put('/{category_id}', 'update')->name('update');
    Route::delete('/{category_id}', 'destroy')->name('destroy')->middleware('can_delete_model');
});

Route::resource('products', ProductController::class)->middleware('auth:web');



