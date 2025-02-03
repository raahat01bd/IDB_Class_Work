<?php

use App\Http\Controllers\FlightController;
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

Route::get('home', [FlightController::class, 'show']);
Route::delete('delete{id}', FlightController::class.'@destroy')->name('delete');
Route::get('create', [FlightController::class, 'create'])->name('create');
Route::post('store', [FlightController::class,'store'])->name('store');
Route::get('edit/{id}', [FlightController::class, 'edit'])->name('edit');
Route::post('update/{id}', [FlightController::class, 'update'])->name('update');
