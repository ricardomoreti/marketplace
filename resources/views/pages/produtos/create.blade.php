@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastrar Produto</h1>
</div>

<form class="form" method="POST" action="{{ route('cadastrar.produto') }}">
    @csrf
    <div class="form-row">
        <div class="mb-3">
            <label for="sku" class="form-label">SKU</label>
            <input type="text" value="{{ old('sku') }}" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" />
            @if ($errors->has('sku'))
                <div class="invalid-feedback"> {{ $errors->first('sku') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" value="{{ old('nome') }}" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" />
            @if ($errors->has('nome'))
                <div class="invalid-feedback"> {{ $errors->first('nome') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="text" value="{{ old('preco') }}" class="form-control @error('preco') is-invalid @enderror" id="mascara_valor" name="preco" />
            @if ($errors->has('preco'))
                <div class="invalid-feedback"> {{ $errors->first('preco') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" value="{{ old('marca') }}" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca" />
            @if ($errors->has('marca'))
                <div class="invalid-feedback"> {{ $errors->first('marca') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label>Gênero</label>
            <div class="form-check">
                <input class="form-check-input @error('genero') is-invalid @enderror" type="radio" name="genero" id="feminino" value="feminino" {{ old('genero')=="feminino" ? 'checked='.'"'.'checked'.'"' : '' }} />
                <label class="form-check-label" for="feminino">Feminino</label>
            </div>
            <div class="form-check">
                <input class="form-check-input @error('genero') is-invalid @enderror" type="radio" name="genero" id="masculino" value="masculino" {{ old('genero')=="masculino" ? 'checked='.'"'.'checked'.'"' : '' }} />
                <label class="form-check-label" for="masculino">Masculino</label>
            </div> 
            <div class="form-check">
                <input class="form-check-input @error('genero') is-invalid @enderror" type="radio" name="genero" id="unissex" value="unissex" {{ old('genero')=="unissex" ? 'checked='.'"'.'checked'.'"' : '' }} />
                <label class="form-check-label" for="unissex">Unissex</label>
            </div>
        </div>
        
        <div class="mb-3 form-floating">
            <textarea class="form-control @error('descricao') is-invalid @enderror" placeholder="Descreva os detalhes do produto" name="descricao" id="descricao" style="height: 100px;">{{ old('descricao') }}</textarea>
            <label for="descricao">Descrição</label>
        </div>

        <button type="submit" class="btn btn-primary">GRAVAR</button>
    </div>
  </form>
@endsection
