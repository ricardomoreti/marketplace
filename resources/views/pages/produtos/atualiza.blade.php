@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Produto</h1>
</div>

<form class="form" method="POST" action="{{ route('atualizar.produto', $findProduto->id) }}">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="mb-3">
            <label for="sku" class="form-label">SKU</label>
            <input type="text" value="{{ isset($findProduto->sku) ? $findProduto->sku : old('sku') }}" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" />
            @if ($errors->has('sku'))
                <div class="invalid-feedback"> {{ $errors->first('sku') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" value="{{ isset($findProduto->nome) ? $findProduto->nome : old('nome') }}" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" />
            @if ($errors->has('nome'))
                <div class="invalid-feedback"> {{ $errors->first('nome') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="text" value="{{ isset($findProduto->preco) ? $findProduto->preco : old('preco') }}" class="form-control @error('preco') is-invalid @enderror" id="mascara_valor" name="preco" />
            @if ($errors->has('preco'))
                <div class="invalid-feedback"> {{ $errors->first('preco') }}</div>
            @endif
        </div>

        <div class="row mb-3">
            <div class="col-sm">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" value="{{ isset($findProduto->marca) ? $findProduto->marca : old('marca') }}" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca" />
                @if ($errors->has('marca'))
                    <div class="invalid-feedback"> {{ $errors->first('marca') }}</div>
                @endif
            </div>

            <div class="col-sm">
                <label class="form-label">Gênero</label>
                <div style="clear:both"></div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('genero') is-invalid @enderror" type="radio" name="genero" id="feminino" value="feminino" {{ $findProduto->genero=="feminino" ? 'checked='.'"'.'checked'.'"' : '' }} />
                    <label class="form-check-label" for="feminino">Feminino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('genero') is-invalid @enderror" type="radio" name="genero" id="masculino" value="masculino" {{ $findProduto->genero=="masculino" ? 'checked='.'"'.'checked'.'"' : '' }} />
                    <label class="form-check-label" for="masculino">Masculino</label>
                </div> 
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('genero') is-invalid @enderror" type="radio" name="genero" id="unissex" value="unissex" {{ $findProduto->genero=="unissex" ? 'checked='.'"'.'checked'.'"' : '' }} />
                    <label class="form-check-label" for="unissex">Unissex</label>
                </div>
            </div>
        </div>
        
        <label class="form-check-label mb-3">Descrição</label>
        <div class="mb-3 form-floating">
            <textarea class="form-control @error('descricao') is-invalid @enderror"  value="{{ old('descricao') }}" placeholder="Descreva os detalhes do produto" name="descricao" id="descricao" style="height: 100px">{{ $findProduto->descricao }}</textarea>
            <label for="descricao">Descreva os detalhes do produto</label>
        </div>

        <div class="row mb-3">
            <div class="col-sm">
                <label for="calcado_material_externo" class="form-label">Material Externo</label>
                <input type="text" value="{{ isset($findProduto->calcado_material_externo) ? $findProduto->calcado_material_externo : old('calcado_material_externo') }}" class="form-control @error('calcado_material_externo') is-invalid @enderror" id="calcado_material_externo" name="calcado_material_externo" />
                @if ($errors->has('calcado_material_externo'))
                    <div class="invalid-feedback"> {{ $errors->first('calcado_material_externo') }}</div>
                @endif
            </div>

            <div class="col-sm">
                <label for="calcado_material_interno" class="form-label">Material Interno</label>
                <input type="text" value="{{ isset($findProduto->calcado_material_interno) ? $findProduto->calcado_material_interno : old('calcado_material_interno') }}" class="form-control @error('calcado_material_interno') is-invalid @enderror" id="calcado_material_interno" name="calcado_material_interno" />
                @if ($errors->has('calcado_material_interno'))
                    <div class="invalid-feedback"> {{ $errors->first('calcado_material_interno') }}</div>
                @endif
            </div>

            <div class="col-sm">
                <label for="calcado_material_solado" class="form-label">Material do Solado</label>
                <input type="text" value="{{ isset($findProduto->calcado_material_solado) ? $findProduto->calcado_material_solado : old('calcado_material_solado') }}" class="form-control @error('calcado_material_solado') is-invalid @enderror" id="calcado_material_solado" name="calcado_material_solado" />
                @if ($errors->has('calcado_material_solado'))
                    <div class="invalid-feedback"> {{ $errors->first('calcado_material_solado') }}</div>
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-sm">
                <label for="calcado_tipo_fechamento" class="form-label">Tipo de Fechamento</label>
                <input type="text" value="{{ isset($findProduto->calcado_tipo_fechamento) ? $findProduto->calcado_tipo_fechamento : old('calcado_tipo_fechamento') }}" class="form-control @error('calcado_tipo_fechamento') is-invalid @enderror" id="calcado_tipo_fechamento" name="calcado_tipo_fechamento" />
                @if ($errors->has('calcado_tipo_fechamento'))
                    <div class="invalid-feedback"> {{ $errors->first('calcado_tipo_fechamento') }}</div>
                @endif
            </div>

            <div class="col-sm">
                <label for="peso" class="form-label">Peso</label>
                <input type="text" value="{{ isset($findProduto->peso) ? $findProduto->peso : old('peso') }}" class="form-control @error('peso') is-invalid @enderror" id="peso" name="peso" />
                @if ($errors->has('peso'))
                    <div class="invalid-feedback"> {{ $errors->first('peso') }}</div>
                @endif
            </div>

            <div class="col-sm">
                <label for="ncm" class="form-label">NCM</label>
                <input type="text" value="{{ isset($findProduto->ncm) ? $findProduto->ncm : old('ncm') }}" class="form-control @error('ncm') is-invalid @enderror" id="ncm" name="ncm" />
                @if ($errors->has('ncm'))
                    <div class="invalid-feedback"> {{ $errors->first('ncm') }}</div>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <label class="form-label">Dimensões do Produto</label>
            <div class="col-sm">
              <input type="text" value="{{ isset($findProduto->largura) ? $findProduto->largura : old('largura') }}" class="form-control @error('largura') is-invalid @enderror" name="largura" id="largura" class="form-control" placeholder="Largura" aria-label="Largura">
              @if ($errors->has('largura'))
                <div class="invalid-feedback"> {{ $errors->first('largura') }}</div>
              @endif
            </div>X
            <div class="col-sm">
              <input type="text" value="{{ isset($findProduto->altura) ? $findProduto->altura : old('altura') }}" class="form-control @error('altura') is-invalid @enderror" name="altura" id="altura" class="form-control" placeholder="Altura" aria-label="Altura">
              @if ($errors->has('altura'))
                <div class="invalid-feedback"> {{ $errors->first('altura') }}</div>
              @endif
            </div>X
            <div class="col-sm">
              <input type="text" value="{{ isset($findProduto->comprimento) ? $findProduto->comprimento : old('comprimento') }}" class="form-control @error('comprimento') is-invalid @enderror" name="comprimento" id="comprimento" class="form-control" placeholder="Comprimento" aria-label="Comprimento">
              @if ($errors->has('comprimento'))
                <div class="invalid-feedback"> {{ $errors->first('comprimento') }}</div>
              @endif
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Fotos</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($findProduto->fotos as $fotos)
                        @php 
                            $fotoPath = str_replace('public/', '', $fotos->path);
                            $fotoOriginalName = $fotos->nome;
                        @endphp
                        <tr>
                        <td class="align-middle">
                            <img src="{{ asset("storage/{$fotoPath}") }}" alt="{{ $fotoOriginalName }}" class="img-thumbnail" style="width: 150px; height: 150px;"/>
                        </td>

                        <td class="align-middle">
                            <form method="POST" action="{{ route('produtofoto.delete', $fotos->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm ('Tem certeza que deseja excluir esta foto?')">Excluir Foto</button>
                            </form>
                        </td>
                        @endforeach
                        </tr>
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-primary">GRAVAR</button>
    </div>
  </form>
@endsection