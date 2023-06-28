<?php

    namespace App\Http\Controllers;

    use App\Models\ProdutoFoto;
    use Brian2694\Toastr\Facades\Toastr;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;

    class ProdutoFotoController extends Controller
    {
        public function delete(Request $request)
        {
            $id = $request->id;
            $buscaRegistro = ProdutoFoto::find($id);

            $produtoFoto = $buscaRegistro;
            $fotoPath = str_replace('public/', '', $produtoFoto->path);

            if (Storage::disk('public')->exists($fotoPath)){
                Storage::disk('public')->delete($fotoPath);
            }
            
            if($buscaRegistro->delete()==true) {
                Toastr::info('Foto Excluída com sucesso.');
                return  redirect()->back();
            }
        }
    }
