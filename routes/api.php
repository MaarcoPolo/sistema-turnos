<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

use App\Http\Controllers\TurnoController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\TipoUsuarioController;

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

Route::post('/generar-turno', [TurnoController::class, 'generarTurno']);

Route::get('/cajas', [CajaController::class, 'getCajas']);

Route::post('/cajas/crear-caja', [CajaController::class, 'guardarCaja']);
Route::post('/cajas/actualizar-caja', [CajaController::class, 'actualizarCaja']);
Route::post('/cajas/eliminar-caja', [CajaController::class, 'eliminarCaja']);

Route::get('/usuarios', [TipoUsuarioController::class, 'getUsuarios']);

Route::post('/usuarios/crear-usuario', [TipoUsuarioController::class, 'guardarUsuario']);
Route::post('/usuarios/actualizar-usuario', [TipoUsuarioController::class, 'actualizarUsuario']);
Route::post('/usuarios/eliminar-usuario', [TipoUsuarioController::class, 'eliminarUsuario']);