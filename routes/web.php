<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\DetailController;
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
    return redirect()->route('login');
});

// search cash data url

Route::get('saremeotech',[AccountController::class,'index'])->name('saremeotech');
Route::post('searchresult',[AccountController::class,'searchresult'])->name('searchresult');

// Add cash data url
 
Route::get('addcash',[AccountController::class,'add'])->name('addcash');
Route::post('storecash',[AccountController::class,'store'])->name('storecash');

// header url

Route::post('addheader',[HeaderController::class,'addHeader'])->name('addheader');

// Cash url and create account

Route::post('addcash',[CashController::class,'addcash'])->name('addcash');
Route::post('addaccount',[CashController::class,'createaccount'])->name('addaccount');

//loan url

Route::post('loancash',[LoanController::class,'add_loan'])->name('loancash');

//detail url

Route::post('adddetail',[DetailController::class,'add_detail'])->name('adddetail');



Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
