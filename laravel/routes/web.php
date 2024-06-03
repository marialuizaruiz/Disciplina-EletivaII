<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\AlunosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bem-vindo', function () {
    return "Seja bem vindo!";
});

Route::get('/mensagem/{mensagem}', [HomeController::class, 'mostrarMensagem']);

Route::resources([
    'clientes' => ClientesController::class,
    #'produtos => ProdutosController::class
]);

Route::get('/clientes/{id}/delete', [ClientesController::class, 'delete']);

Route::resources([
    'alunos' => AlunosController::class,
]);
Route::get('/alunos/{id}/delete', [AlunosController::class, 'delete']);