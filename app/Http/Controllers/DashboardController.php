<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDeProdutoCadastrado = $this->buscaTotalProdutoCadastrado();
        $totalDeUsuarioCadastrado = $this->buscaTotalUsuarioCadastrado();

        return view('pages.dashboard.dashboard', compact('totalDeProdutoCadastrado', 'totalDeUsuarioCadastrado'));
    }

    public function buscaTotalProdutoCadastrado()
    {
        $findProduto = Produto::all()->count();
        
        return $findProduto;
    }

    public function buscaTotalUsuarioCadastrado() 
    {
        $findUsuario = User::all()->count();

        return $findUsuario;
    }
}
