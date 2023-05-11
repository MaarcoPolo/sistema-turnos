<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\CajaController;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\TipoTurnoController;

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
    
    Route::get('/cajas', [CajaController::class, 'getCajas']);
    Route::post('/cajas/crear-caja', [CajaController::class, 'guardarCaja']);
    Route::post('/cajas/actualizar-caja', [CajaController::class, 'actualizarCaja']);
    Route::post('/cajas/eliminar-caja', [CajaController::class, 'eliminarCaja']);
});
    
Route::post('/generar-turno', [TurnoController::class, 'generarTurno']);
Route::post('/imprimir-turno', [TurnoController::class, 'imprimirTurno']);
Route::post('/atender-turno', [TurnoController::class, 'atenderTurno']);

Route::post('/cargar-turnos', [TurnoController::class, 'cargarTurnos']);



Route::get('/broadcast', function () {
    broadcast(new NewMessage());
});

