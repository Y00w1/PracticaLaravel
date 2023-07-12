<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profile\AvatarController;
use App\Http\Controllers\Watch\ImageController;
use App\Http\Controllers\WatchController;

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

Route::get('/',[WatchController::class, 'index'])->name('shop');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [avatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Routes for watches
    Route::resource('watches', WatchController::class);
    Route::get('/watches/image', [ImageController::class, 'edit'])->name('watch.image.edit');
    Route::patch('/watches/image', [ImageController::class, 'update'])->name('watch.image');

});

require __DIR__.'/auth.php';
