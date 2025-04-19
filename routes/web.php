<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/show', [IndexController::class, 'show']);

Route::get('/between', [IndexController::class, 'stagebetween'])->name('between');
Route::get('/count', [IndexController::class, 'generalcount'])->name('count');
Route::get('/prog', [IndexController::class, 'programmer'])->name('prog');
Route::get('/job', [IndexController::class, 'unique'])->name('job');

Route::get('/create', [IndexController::class, 'create'])->name('create');
Route::post('create/cv', [IndexController::class, 'store'])->name('store');
/*
Route::get('/', function () {
    return view('welcome');
});*/
?>