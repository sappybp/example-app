<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::prefix('images')
    ->controller(ImageController::class)
    ->as('images.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('random', 'random')->name('random');
        Route::get('favorite', 'favorite')->name('favorite');
        Route::get('{image}', 'show')->name('show');
        Route::get('{image}/edit', 'edit')->name('edit');
        Route::put('{image}', 'update')->name('update');
        Route::delete('{image}', 'destroy')->name('destroy');
        Route::post('{image}/like', 'like')->name('like');
        Route::post('{image}/unlike', 'unlike')->name('unlike');
        Route::get('{image}/checkLike', 'checkLike')->name('checkLike');
    });
});

require __DIR__.'/auth.php';
