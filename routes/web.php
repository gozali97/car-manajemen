<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::controller(HomeController::class)->group(function () {
    Route::get('/',  'index')->name('home');
    Route::get('/about',  'about')->name('about');
    Route::get('/contact',  'contact')->name('contact');
});

Route::controller(\App\Http\Controllers\ProductController::class)->group(function () {
    Route::get('/product',  'index')->name('product.index');
    Route::get('/product/view/{product:slug}',  'show')->name('product.view');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/pay', [DashboardController::class, 'store'])->name('pay');
    Route::get('/invoice/{id}', [DashboardController::class, 'invoice'])->name('invoice');

    Route::controller(\App\Http\Controllers\TransaksiController::class)->group(function () {
        Route::get('/transaksi', 'index')->name('transaksi');
        Route::get('/transaksi/add/{product:slug}', 'add')->name('transaksi.add');
        Route::post('/transaksi/store', 'store')->name('transaksi.store');
        Route::put('/transaksi/update/{id}', 'update')->name('transaksi.update');
        Route::delete('/transaksi/delete/{id}', 'destroy')->name('transaksi.delete');
    });

    Route::controller(AddressController::class)->group(function () {
        Route::get('/address', 'index')->name('address');
        Route::post('/address/store', 'store')->name('address.store');
        Route::put('/address/update/{id}', 'update')->name('address.update');
        Route::delete('/address/delete/{id}', 'destroy')->name('address.delete');
    });
});

require __DIR__.'/auth.php';
