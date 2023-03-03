<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\penyakitController;

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

Route::get('/', [frontendController::class, 'Index']);
//route::get('result', [penyakitController::class, 'Result']);
route::post('result', [penyakitController::class, 'Insert']);


Auth::routes();

Route::get('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware( ['auth','isAdmin'])->group(function () {
    route::get('resep', [frontendController::class, 'Resep']);
    route::get('add-resep', [frontendController::class, 'Add']);
    route::post('insert-resep', [frontendController::class, 'Insert']);
    route::get('edit-resep/{id}', [frontendController::class, 'Edit']);
    route::put('update-resep/{id}', [frontendController::class, 'Update']);
    route::get('delete-resep/{id}', [frontendController::class, 'Destroy']);

});

