<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user', UserController::class)->middleware('auth');
Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::get('value',[DashboardController::class,'value'])->name('dashboard.value');
Route::prefix('admin')->middleware(['auth','role:admin'])->group(function(){
    Route::resource('booking', BookingController::class);
    Route::resource('vehicle', VehicleController::class);
    Route::resource('driver', DriverController::class);
    Route::resource('history', Historyontroller::class);
});
Route::resource('approval', ApprovalController::class)->middleware(['auth','role:level1','role:level2']);
