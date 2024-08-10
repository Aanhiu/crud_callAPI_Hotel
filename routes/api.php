<?php

use App\Http\Controllers\Api\apiHotelController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/list' , [apiHotelController::class , 'index'])->name('list');
Route::get('/delete/{id}' , [apiHotelController::class , 'destroy'])->name('delete');
Route::get('/show/{id}' , [apiHotelController::class , 'show'])->name('show');
Route::post('/add' , [apiHotelController::class , 'store'])->name('add');
Route::put('/update/{id}' , [apiHotelController::class , 'update'])->name('edit');


