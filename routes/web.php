<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\TechController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('test/{page}',[AdminController::class , 'index']);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth']
    ], function(){ 

        Route::get('/',DashboardController::class)->name('dashboard');    
        Route::resource('/services',ServiceController::class);
        Route::resource('/projects',ProjectController::class);
        Route::resource('/tech',TechController::class);
        
    });

require __DIR__.'/auth.php';
