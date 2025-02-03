<?php

use App\Http\Controllers\StudentsController;
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
Route::get('home', [StudentsController::class, 'show']);
Route::get('create', [StudentsController::class, 'create'])->name('create');
Route::post('store', [StudentsController::class,'store'])->name('store');
Route::get('edit{id}', [StudentsController::class, 'edit'])->name('edit');
Route::put('home{id}', [StudentsController::class, 'update'])->name('update');
Route::delete('delete{id}', StudentsController::class.'@destroy')->name('delete');
