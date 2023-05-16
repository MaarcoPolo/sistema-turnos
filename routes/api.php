<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\CajaController;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\TipoTurnoController;
use App\Http\Controllers\CasaJusticiaController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function() {
    Route::post('login', 'login');
});


Route::group(['middleware' => 'auth:sanctum'], function ($router) {
    Route::get('/tipos-turnos', [TipoTurnoController::class, 'getTiposTurnos']);
    
    Route::post('/cajas', [CajaController::class, 'getCajas']);
    Route::post('/cajas/crear-caja', [CajaController::class, 'guardarCaja']);
    Route::post('/cajas/actualizar-caja', [CajaController::class, 'actualizarCaja']);
    Route::post('/cajas/actualizar-tipo-caja', [CajaController::class, 'actualizarTipoCaja']);
    Route::post('/cajas/eliminar-caja', [CajaController::class, 'eliminarCaja']);
});
    
Route::post('/generar-turno', [TurnoController::class, 'generarTurno']);
Route::post('/imprimir-turno', [TurnoController::class, 'imprimirTurno']);
Route::post('/atender-turno', [TurnoController::class, 'atenderTurno']);
Route::post('/turnos-pantalla', [TurnoController::class, 'turnosPantalla']);
Route::post('/turnos-pendientes', [TurnoController::class, 'turnosPendientes']);


Route::post('/cargar-turnos', [TurnoController::class, 'cargarTurnos']);

Route::get('/casas-justicia', [CasaJusticiaController::class, 'getCasasJusticia']);



Route::get('/broadcast', function () {
    broadcast(new NewMessage());
});

