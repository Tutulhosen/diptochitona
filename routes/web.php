<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

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




Route::middleware('admin.redirect')->group(function(){
    Route::get('login', [AdminController::class, 'login_page'])->name('login.page');
    Route::post('login', [AdminController::class, 'login'])->name('login');
});

Route::middleware('admin')->group(function(){
    Route::get('admin-dashboard', [AdminController::class,'index'])->name('admin.dashboard.index');
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
});
