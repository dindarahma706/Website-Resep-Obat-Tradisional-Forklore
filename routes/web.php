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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/empiris',[App\Http\Controllers\empirisController::class,'index'])->name('empiris');
Route::view('/addResep', 'addResep');
Route::middleware( ['auth','verifiedUser'])->group(function () {
    route::get('form', [frontendController::class, 'Form']);
    route::post('result', [penyakitController::class, 'Insert']);
    route::get('history', [penyakitController::class, 'History']);
});

Route::middleware( ['auth','verifiedUser','isAdmin'])->group(function () {
    route::get('resep', [frontendController::class, 'Resep']);
    route::get('users', [frontendController::class, 'Users']);
    route::get('add-resep', [frontendController::class, 'Add']);
    route::post('insert-resep', [frontendController::class, 'Insert']);
    route::get('edit-resep/{id}', [frontendController::class, 'Edit']);
    route::put('update-resep/{id}', [frontendController::class, 'Update']);
    route::get('delete-resep/{id}', [frontendController::class, 'Destroy']);
    route::get('verify-user/{id}', [frontendController::class, 'VerifyUser']);
    route::get('block-user/{id}', [frontendController::class, 'BlockUser']);

});

