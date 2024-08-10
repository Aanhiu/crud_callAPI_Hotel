<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\HotelController;
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
    return view('layouts');
});

Route::get('/list' , [HotelController::class , 'index'])->name('list');

Route::delete('/delete/{hotel}' , [HotelController::class , 'delete'])->name('delete');

Route::get('/add' , [HotelController::class , 'add'])->name('add');

Route::post('/store' , [HotelController::class , 'store'])->name('store');

Route::get('/edit{hotel}' , [HotelController::class , 'edit'])->name('edit');

Route::put('/edit{hotel}' , [HotelController::class , 'update'])->name('update');



