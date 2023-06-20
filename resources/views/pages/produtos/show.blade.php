@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Exibindo: {{ $produto->nome }}</h1>
</div>

<div class="card" style="width: 100%">
    <div class="card-body">
      <h5 class="card-title">{{ $produto->nome }}</h5>
      <h6 class="card-subtitle mb-2 text-body-secondary">{{ 'SKU ' . $produto->sku }}</h6>
      <p class="card-text">{{ 'Descrição: ' . $produto->descricao }}</p>
      <p class="card-text">Preço: </p><p class="card-text" id="mascara_valor">{{ $produto->preco }}</p>
      <p class="card-text">{{ 'Marca ' . $produto->marca }}</p>
      <p class="card-text">{{ 'Gênero ' . $produto->genero }}</p>
      <a href="{{ route('atualizar.produto', $produto->id) }}" class="card-link">Editar</a>
    </div>
</div>

@endsection