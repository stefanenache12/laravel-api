<?php

use App\Http\Controllers\ProfileController;
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

// use App\Http\Controllers\Admin\DasboardController;
// use App\Http\Controllers\Admin\ProjectController;
// use App\Http\Controllers\Guest\MainController;
// use App\Http\Controllers\Admin\TypeController;
// use App\Http\Controllers\Admin\TechnologyController;

// Route::get('/',[MainController::class, 'index'])->name('guest.welcome');
// Route::get('/projects/{id}',[MainController::class, 'show'])->name('guest.show');

// Route::middleware(['auth', 'verified'])
//     ->name('admin.')
//     ->prefix('admin')
//     ->group(function () {

//     Route::get('/dashboard', [DasboardController::class, 'dashboard'])->name('dashboard');

//     Route::resource('projects',ProjectController::class);

//     Route::resource('types',TypeController::class);

//     Route::resource('technologies',TechnologyController::class);
// });

require __DIR__.'/auth.php';