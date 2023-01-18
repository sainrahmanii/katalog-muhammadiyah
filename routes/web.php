<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\Supervisor;
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

Route::controller(CustomerController::class)->group(function(){
    Route::get('/katalog', 'index')->name('landing');
    Route::get('/katalog/{slug}', 'show')->name('show');
    Route::get('/katalog', 'search')->name('search');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('', [Supervisor::class, 'homepage'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin/katalog-muhammadiyah')->middleware('supervisor')->name('katalog.')->group(function(){
        Route::controller(Supervisor::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/all', 'all')->name('all');
            Route::get('/create-shop', 'create')->name('create');
            Route::post('/store-shop', 'store')->name('store');
            Route::get('/edit-all-shop', 'editAll')->name('edit');
            Route::get('/edit-shop/{id}', 'edit')->name('edit.shop');
            Route::put('/update-shop/{id}', 'update')->name('update.shop');
            Route::get('/delete-all-shop', 'deleteAll')->name('delete');
            Route::delete('/delete-all-shop/{id}', 'destroy')->name('destroy');
        });
    });

    Route::prefix('seller/katalog-muammadiyah')->middleware('seller')->name('seller.')->group(function(){
        Route::controller(SellerController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/tambah-produk', 'create')->name('create');
            Route::post('/create-produk', 'post')->name('post');
            Route::get('/edit-produk/{id}', 'edit')->name('edit');
            Route::put('/update-produk/{id}', 'update')->name('update');
            Route::delete('/update-produk/{id}', 'destroy')->name('destroy');
        });
    });
});



require __DIR__.'/auth.php';
