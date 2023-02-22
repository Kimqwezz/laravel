<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/greeting', function () {
    return 'Hell';
});
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/hello/{name}', function ($name) {
    echo "Hello, " , $name;
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'news'], function() {
    Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('news.index');
    Route::get('/create', [\App\Http\Controllers\IndexController::class, 'create'])->name('news.create');
    Route::get('/edit/{id}', [\App\Http\Controllers\IndexController::class, 'edit'])->name('news.edit');
});


require __DIR__.'/auth.php';
