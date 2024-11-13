<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Trip_LocationsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

 Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});
Route::prefix('trip_locations')->group(function () {
    Route::get('/', [Trip_LocationsController::class, 'index']);
    Route::get('/create', [Trip_LocationsController::class, 'create']);
    Route::get('/edit/{id}', [Trip_LocationsController::class, 'edit']);
    Route::post('/update/{id}', [Trip_LocationsController::class, 'update'])->name('trip_locations.update');
    Route::get('/destroy/{id}', [Trip_LocationsController::class, 'destroy']);
    // POST メソッドを追加
    Route::post('/', [Trip_LocationsController::class, 'store'])->name('trip_locations.store');
   // Route::put('/update/{id}', [Trip_LocationsController::class, 'update'])->name('trip_locations.update');
});
