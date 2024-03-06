<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\KategoryController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\UserController;

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

Route::get('/home',[HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/afterregister', function(){ return view('afterregister');});
Route::get('/profile', function(){ return view('profile');});

Route::resource('inventaris', InventarisController::class)->middleware('auth');
Route::resource('kategory', KategoryController::class)->middleware('auth');
Route::resource('gedung', GedungController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');

Route::get('gedungpdf',[GedungController::class,'gedungPDF'])->middleware('auth');
Route::get('gedungcsv',[GedungController::class,'gedungCSV'])->middleware('auth');

Route::get('inventarispdf',[InventarisController::class,'inventarisPDF'])->middleware('auth');
Route::get('inventariscsv',[InventarisController::class,'inventarisCSV'])->middleware('auth');

Route::get('kategorypdf',[KategoryController::class,'kategoryPDF'])->middleware('auth');
Route::get('kategorycsv',[KategoryController::class,'kategoryCSV'])->middleware('auth');

Route::get('userpdf',[UserController::class,'userPDF'])->middleware('auth');
Route::get('usercsv',[UserController::class,'userCSV'])->middleware('auth');
