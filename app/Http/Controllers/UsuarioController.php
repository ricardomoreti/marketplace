<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestUsuario;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function cadastrarUsuario(FormRequestUsuario $request)
    {
        if($request->method() == "POST") {
            //cria os dados
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            User::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('usuario.index');
        }

        //mostrar os dados
        return view('pages.usuarios.create');
    }

    public function atualizarUsuario(FormRequestUsuario $request, $id)
    {
        if ($request->method() == "PUT") {
            // atualiza os dados
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);

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
