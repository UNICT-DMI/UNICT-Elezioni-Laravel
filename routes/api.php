<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\OrganoController;
use App\Http\Controllers\SchedeController;
use App\Http\Controllers\VoticandidatoController;
use App\Http\Controllers\VotilistaController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('organo', OrganoController::class);

Route::apiResource('schede', SchedeController::class);

Route::apiResource('lista', ListaController::class);

Route::apiResource('votilista', VotilistaController::class);

Route::apiResource('candidato', CandidatoController::class);

Route::apiResource('voticandidato', VoticandidatoController::class);
