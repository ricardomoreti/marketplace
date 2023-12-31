<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdutoFotoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

//Dashboard
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

//Produtos
Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutoController::class, 'index'])->name('produto.index');
    //Cadastro Create
    Route::get('/cadastrarProduto', [ProdutoController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto', [ProdutoController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    //Atualiza Update
    Route::get('/atualizarProduto/{id}', [ProdutoController::class, 'atualizarProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}', [ProdutoController::class, 'atualizarProduto'])->name('atualizar.produto');
    //Deletar 
    Route::delete('/delete/{id}', [ProdutoController::class, 'delete'])->name('produto.delete');
    Route::delete('/deleteFoto/{id}', [ProdutoFotoController::class, 'delete'])->name('produtofoto.delete');
    //Visualizar
    Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('visualizar.produto');
});

//Usuários
Route::prefix('usuarios')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuario.index');
    //Cadastro Create
    Route::get('/cadastrarUsuario', [UsuarioController::class, 'cadastrarUsuario'])->name('cadastrar.usuario');
    Route::post('/cadastrarUsuario', [UsuarioController::class, 'cadastrarUsuario'])->name('cadastrar.usuario');
    //Atualiza Update
    Route::get('/atualizarUsuario/{id}', [UsuarioController::class, 'atualizarUsuario'])->name('atualizar.usuario');
    Route::put('/atualizarUsuario/{id}', [UsuarioController::class, 'atualizarUsuario'])->name('atualizar.usuario');
    //Deletar 
    Route::delete('/delete', [UsuarioController::class, 'delete'])->name('usuario.delete');
});