<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProcesosClienteController;

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
    Route::resource('clientes', App\Http\Controllers\Admin\ClienteController::class);
    Route::resource('empresas', App\Http\Controllers\Admin\EmpresaController::class);
    Route::resource('procesos', App\Http\Controllers\Admin\ProcesoController::class);
    Route::resource('procesos_cliente', App\Http\Controllers\Admin\ProcesosClienteController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('procesos_cliente/{clienteId}', [App\Http\Controllers\Admin\ProcesosClienteController::class, 'index'])->name('admin.procesos_cliente.index');
    Route::get('procesos_cliente', [ProcesosClienteController::class, 'index'])->name('procesos_cliente.index'); // Lista todos los clientes
    Route::get('procesos_cliente/{clienteId}', [ProcesosClienteController::class, 'show'])->name('procesos_cliente.show'); // Muestra los procesos de un cliente
    Route::put('procesos_cliente/{procesosCliente}', [ProcesosClienteController::class, 'update'])->name('procesos_cliente.update'); // Actualiza el estado de un proceso
});