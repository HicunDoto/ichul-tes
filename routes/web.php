<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\SalesController;
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


Route::get('/',[LoginController::class,'home'])->name('login');

// Route::get('/program',[MarketingController::class,'program'])->name('program');
// Route::post('/program',[MarketingController::class,'saveProgram'])->name('saveProgram');

Route::group(['middleware'=>['marketing']], function(){
    Route::get('/program',[MarketingController::class,'program'])->name('program');
});

Route::group(['middleware'=>['sales']], function(){
    Route::get('/sales',[SalesController::class,'customer'])->name('customer');
});
