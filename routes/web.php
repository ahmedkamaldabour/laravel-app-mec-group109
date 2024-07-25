<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
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
})->name('dashboard.index');


Route::get('login',[AuthController::class , 'loginForm'])->name('login.form');
Route::post('login',[AuthController::class , 'login'])->name('login.submit');



// CURD ( Category -> Name and description  ) ( index , show , create , store , edit , update , destroy ) 7 routes


// migration file ( php artisan make:migration create_categories_table )
// run migration ( php artisan migrate )
// model file ( php artisan make:model Category )
// controller file ( php artisan make:controller CategoryController)



// define routes
// Create views ( index ( all data ) , show ( one row ) , create , edit )

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{category_id}', [CategoryController::class, 'show'])->name('categories.show');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category_id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category_id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category_id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


// get post ( put , patch , delete )


// erd
// migration file
// prepare the model
// main super admin user and fake data ( factory and seeder )
// run .....
// make controller
