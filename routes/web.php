<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MegyekController;
use App\Http\Controllers\HomeController;

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
    return view('home',);
})->name('home');

//Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('varmegye', [MegyekController::class, 'index'])->name('varmegye');
Route::post('megyek', [MegyekController::class, 'save'])->name('saveMegyek');
Route::get('megyek/create', [MegyekController::class, 'create'])->name('createMegyek');
Route::post('megyek/{id}', [MegyekController::class, 'edit'])->name('editMegyek');
Route::patch('megyek/{id}', [MegyekController::class, 'update'])->name('updateMegyek');
Route::delete('megyek/{id}', [MegyekController::class, 'delete'])->name('deleteMegyek');
Route::post('varmegye/search', [MegyekController::class, 'search'])->name('searchMegyekk');