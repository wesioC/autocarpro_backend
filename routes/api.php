<?php

/* use Illuminate\Http\Request; */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProprietarioController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\RevisaoController;
use App\Http\Controllers\CountVeiculosController;
use App\Http\Controllers\CountMarcasController;
use App\Http\Controllers\PessoasRevisoesController;


/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
// Rota que retorna a contagem veiculos por sexo
Route::apiResource('relatorio1', CountVeiculosController::class); 

// Rota que retorna o relatorio de marcas com mais defeitos
Route::apiResource('relatorio2', CountMarcasController::class); 

// Rota que retorna o relatorio de pessoas com mais revisoes
Route::apiResource('relatorio3', PessoasRevisoesController::class); 

// Rota que retorna todos os proprietarios
Route::apiResource('proprietarios', ProprietarioController::class); 

// Rota que retorna todos os veiculos
Route::apiResource('veiculos', VeiculoController::class);

// Rota que retorna todos as revisoes
Route::apiResource('revisoes',RevisaoController::class);