<?php

use App\Models\User;
use App\Events\Hello;
use App\Events\PrivateTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CajaController;
use App\Http\Controllers\TurnoController;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\TipoTurnoController;
use App\Http\Controllers\CasaJusticiaController;

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

Broadcast::routes(['middleware' => ['auth:sanctum']]);

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

    Route::get('/usuarios', [TipoUsuarioController::class, 'getUsuarios']);
    Route::post('/usuarios/crear-usuario', [TipoUsuarioController::class, 'guardarUsuario']);
    Route::post('/usuarios/actualizar-usuario', [TipoUsuarioController::class, 'actualizarUsuario']);
    Route::post('/usuarios/eliminar-usuario', [TipoUsuarioController::class, 'eliminarUsuario']);
});
    
Route::post('/generar-turno', [TurnoController::class, 'generarTurno']);
Route::post('/imprimir-turno', [TurnoController::class, 'imprimirTurno']);
Route::post('/atender-turno', [TurnoController::class, 'atenderTurno']);
Route::post('/turnos-pantalla', [TurnoController::class, 'turnosPantalla']);
Route::post('/turnos-pendientes', [TurnoController::class, 'turnosPendientes']);


Route::post('/cargar-turnos', [TurnoController::class, 'cargarTurnos']);

Route::get('/casas-justicia', [CasaJusticiaController::class, 'getCasasJusticia']);



// Route::get('/broadcast', function () {
//     broadcast(new NewMessage());
// });

// Route::get('/broadcast', function () {
//     // return Hello::dispatch();
//     Hello::dispatch();
//     return 'sent';
// });

// Route::get('/broadcast-private', function () {
//     $user = User::find(1);
//     // return Hello::dispatch();
//     PrivateTest::dispatch($user);
//     return 'sent ' . $user->nombre;
// });
