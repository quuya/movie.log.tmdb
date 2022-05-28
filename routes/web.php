<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MovieController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('movie',[MovieController::class,'index']);
Route::get('movie/create',[MovieController::class,'create']);
Route::post('movie/create',[MovieController::class,'store']);
Route::get('movie/edit',[MovieController::class,'edit']);
Route::post('movie/edit/{id}',[MovieController::class,'update']);
Route::post('movie/delete/{id}',[MovieController::class,'delete']);
Route::get('movie/show/{id}',[MovieController::class,'show']);




















