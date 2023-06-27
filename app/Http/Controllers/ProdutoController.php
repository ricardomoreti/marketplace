<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use App\Models\Produto;
use App\Models\ProdutoFoto;
use Brian2694\Toastr\Facades\Toastr;
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

    public function cadastrarProduto(FormRequestProduto $request )
    {
        if($request->method() == "POST") {
            //cria os dados
            $data = $request->all();
            
            $componentes = new Componentes();
            $data['preco'] = $componentes->formatacaoMascaraDinheiroDecimal($data['preco']);
            $produto = Produto::create($data);

            //fotos
            $validatedData = $request->validate([
                'fotos' => 'required',
                'fotos' => 'image',
                'fotos' => 'max:2048',
                'fotos.*' => 'mimes:png,jpg,jpeg,gif,svg'
            ]);

            $totalFiles = count($request->file('fotos'));
            $files = $request->file('fotos');

            if($totalFiles > 0)
            {
                for ($x=0; $x<$totalFiles; $x++)
                {
                    $foto = new ProdutoFoto();
                    
                    $file = $files[$x];
                    $foto->produto_id = $produto->id;
                    $foto->nome = $file->getClientOriginalName();
                    $foto->path = $file->store('public/fotos');

                    $foto->save();

                    //ProdutoFoto::create($foto);
                }
            }

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('produto.index');
        }

        //mostrar os dados
        return view('pages.produtos.create');
    }

    public function atualizarProduto(FormRequestProduto $request, $id)
    {
        if ($request->method() == "PUT") {
            // atualiza os dados
            $data = $request->all();
            $componentes = new Componentes();
            $data['preco'] = $componentes->formatacaoMascaraDinheiroDecimal($data['preco']);

            $buscaRegistro = Produto::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('produto.index');
        }

        //mostrar os dados
        $findProduto = Produto::where('id', '=', $id)->first();

        //retornar view/form
        return view('pages.produtos.atualiza', compact('findProduto'));
    }

    public function show(string $id)
    {
        $produto = Produto::find($id);

        return view('pages.produtos.show', compact('produto'));
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Produto::find($id);
        $buscaRegistro->delete();

        Toastr::info('Excluído com sucesso.');
        return response()->json(['success' => true]);
    }
}