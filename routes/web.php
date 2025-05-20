<?php

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

use App\Http\Controllers\EventoController;

Route::get('/agenda/eventos', [App\Http\Controllers\EventoController::class, 'eventos'])->name('agenda.eventos');
Route::get('/agenda', [EventoController::class, 'index'])->name('agenda.index');
Route::get('/agenda/eventos', [EventoController::class, 'eventos'])->name('agenda.eventos');
Route::post('/agenda', [EventoController::class, 'store'])->name('agenda.store');
Route::get('/', function () {
    return redirect('/login'); 
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Route::middleware(['auth'])->group(function () {
    Route::resource('admin/users', App\Http\Controllers\Admin\UserController::class);
});*/

Auth::routes();

Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});