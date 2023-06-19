<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findUsuario = $this->user->getUsuariosPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.usuarios.paginacao', compact('findUsuario'));
    }

    public function cadastrarUsuario(Request $request)
    {
        if($request->method() == "POST") {
            //cria os dados
            $data = $request->only('nome', 'valor');
            User::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('usuario.index');
        }

        //mostrar os dados
        return view('pages.usuarios.create');
    }

    public function atualizarUsuario(Request $request, $id)
    {
        if ($request->method() == "PUT") {
            // atualiza os dados
            $data = $request->all();

            $buscaRegistro = User::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('usuario.index');
        }

        //mostrar os dados
        $findUsuario = User::where('id', '=', $id)->first();

        //retornar view/form
        return view('pages.usuarios.atualiza', compact('findUsuario'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = User::find($id);
        $buscaRegistro->delete();

        Toastr::info('Excluído com sucesso.');
        return response()->json(['success' => true]);
    }
}
