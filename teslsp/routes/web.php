<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\MotorsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\TrucksController;
use App\Models\main;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('main', [
        'mains'=>main::all(),
        'totals'=> DB::table('mains')
        ->select('name', DB::raw('SUM(jumlahharga) as total_harga'))
        ->groupBy('name')
        ->get()

    ]);
});

Route::get('buttonorder', function () {
    return view('buttonorder');
});

Route::resource('customer', CustomerController::class);

Route::resource('mobil', MobilController::class);

Route::resource('motor', MotorController::class);

Route::resource('truck', TruckController::class);

Route::resource('order', OrderController::class);

Route::resource('ordermotor', MotorsController::class);

Route::resource('ordertruck', TrucksController::class);