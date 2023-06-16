<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('index');
});

Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutoController::class, 'index'])->name('produto.index');
    Route::get('/adicionar', [ProdutoController::class, 'create'])->name('produto.create');
    Route::post('/adicionar', [ProdutoController::class, 'store'])->name('produto.store');
    Route::delete('/delete/{produto}', [ProdutoController::class, 'delete'])->name('produto.delete');
});
