<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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

Route::resource('/', FrontEndController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::resource('businesses', BusinessController::class);
    Route::resource('roles', RoleController::class);

    Route::get('roles_map', [BusinessController::class, 'show'])->name('roles.map');

    Route::get('/delete_businesses/{business}', [BusinessController::class, 'destroy'])->name('delete');
    Route::get('/delete_roles/{role}', [RoleController::class, 'destroy'])->name('deleterole');
    

});

require __DIR__.'/auth.php';
