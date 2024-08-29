<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

Route::get('/home', function () {
    return view('frontend.pages.home');
});


// Route::get('/dashboard', function () {
//     return view('backend.pages.dashboard');
// });

Route::prefix('admin/')->group(function() {

    Route::get('login',[LoginController::class, 'loginPage'])->name('admin.loginPage');
    Route::post('login',[LoginController::class, 'login'])->name('admin.login');
    Route::get('logout',[LoginController::class, 'logout'])->name('admin.logout');



    Route::middleware(['auth'])->group(function(){

        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
});



});
