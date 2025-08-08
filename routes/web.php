<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\ProcesoController;
use App\Http\Controllers\Admin\ProcesosClienteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\OrganigramaController;
use App\Http\Controllers\Admin\OrganigramaConfiguracionController;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/agenda', [EventoController::class, 'index'])->name('admin.agenda.index');
Route::get('/agenda/eventos', [EventoController::class, 'eventos'])->name('admin.agenda.eventos');
Route::post('/agenda', [EventoController::class, 'store'])->name('admin.agenda.store');

RRoute::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::get('clientes/deseleccionar', [ClienteController::class, 'deseleccionar'])->name('clientes.deseleccionar');
    Route::resource('clientes', ClienteController::class);
    Route::get('clientes/seleccionar/{id}', [ClienteController::class, 'seleccionar'])->name('clientes.seleccionar');
    Route::get('clientes/deseleccionar', [ClienteController::class, 'deseleccionar'])->name('clientes.deseleccionar');
    Route::resource('empresas', EmpresaController::class);
    Route::resource('procesos', ProcesoController::class);

    Route::resource('procesos_cliente', ProcesosClienteController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('procesos_cliente', [ProcesosClienteController::class, 'index'])->name('procesos_cliente.index'); // Lista todos los clientes
    Route::get('procesos_cliente/{clienteId}', [ProcesosClienteController::class, 'show'])->name('procesos_cliente.show'); // Muestra procesos por cliente
    Route::put('procesos_cliente/{procesosCliente}', [ProcesosClienteController::class, 'update'])->name('procesos_cliente.update'); // Actualiza procesos cliente

    Route::get('organigrama/{empresa_id?}', [OrganigramaController::class, 'index'])->name('empresas.organigramas.index');
    Route::post('organigrama', [OrganigramaController::class, 'store'])->name('organigrama.store');
    Route::resource('organigrama_configuracion', OrganigramaConfiguracionController::class);

});
