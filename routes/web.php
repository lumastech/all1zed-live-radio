<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RadioController;
use App\Http\Controllers\TvController;

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
Route::get('/', [RadioController::class, 'home'])->name('home');
Route::get('/radios', [RadioController::class, 'index'])->name('radios');
Route::get('/dashboard', [RadioController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/play/{id}', [RadioController::class, 'play'])->name('play');

// admin group routes
Route::middleware('auth')->prefix('admin')->group(function (){
    // radio
    Route::get('/', [RadioController::class, 'dashboard'])->name('dashboard');
    Route::post('storeradio', [RadioController::class, 'store']);
    Route::get('deleteradio/{id}', [RadioController::class, 'delete']);
    Route::post('/updateradio', [RadioController::class, 'update']);
    Route::post('/updateradioimage', [RadioController::class, 'updateimage']);
    Route::get('/editradio/{id}', [RadioController::class, 'edit'])->name('editradio');
});

require __DIR__.'/auth.php';
