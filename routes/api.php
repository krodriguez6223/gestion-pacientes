<?php

use App\Http\Controllers\PacienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//rutas para el Crud de paciente,(Agregar, eliminar y mostrar)
Route::resource('paciente', PacienteController::class)->only(['index', 'store', 'update', 'show', 'destroy']);

//muestra todos los historial de todos los pacientes
Route::get('/historial', [PacienteController::class, 'historial']);

//muestra el historial de cada paciente
Route::get('/historial/{paciente}', [PacienteController::class, 'pacienteHistorial']);
