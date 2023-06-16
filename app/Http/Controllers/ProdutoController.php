<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findProduto = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.produtos.paginacao', compact('findProduto'));
    }

    public function create(Request $request )
    {
        if($request->method() == "POST") {
            //cria os dados
        }
        //senão cria uma tela na view
        return view('pages.produtos.create');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function delete($produto)
    {
        $buscaRegistro = Produto::find($produto);
        $buscaRegistro->delete();

        return redirect()->route('produto.index');
    }
}
