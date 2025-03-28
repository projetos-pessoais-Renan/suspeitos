<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuspeitosController;
use App\Http\Controllers\UsuariosController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [SuspeitosController::class, 'index']);

    Route::get('/lista-suspeitos', [SuspeitosController::class, 'listaSuspeitos'])->name('lista_suspeitos');
    Route::get('/cadastrar-suspeitos', [SuspeitosController::class, 'cadastrarSuspeitos'])->name('cadastrar_suspeitos');
    Route::post('/cadastro-suspeito-post', [SuspeitosController::class, 'cadastroSuspeitoPost'])->name('cadastrar_suspeito_post');
    Route::get('/suspeito/{id}', [SuspeitosController::class, 'detalhesSuspeito'])->name('suspeito.detalhes');
    Route::get('/suspeito/{id}/editar', [SuspeitosController::class, 'editarSuspeito'])->name('suspeito.editar');
    Route::put('/suspeito/{id}/atualizar', [SuspeitosController::class, 'atualizarSuspeito'])->name('suspeito.atualizar');
    Route::delete('/suspeito/{id}', [SuspeitosController::class, 'destroy'])->name('suspeito.excluir');

    Route::get('/lista-admin', [UsuariosController::class, 'listaAdmin'])->name('lista_admin');
    Route::get('/cadastrar-admin', [UsuariosController::class, 'cadastrarAdmin'])->name('cadastrar_admin');

    Route::get('/lista-suporte', [UsuariosController::class, 'listasuporte'])->name('lista_suporte');
    Route::get('/cadastrar-suporte', [UsuariosController::class, 'cadastrarSuporte'])->name('cadastrar_suporte');

    Route::get('{routeName}/{name?}', [HomeController::class, 'pageView']);
});
