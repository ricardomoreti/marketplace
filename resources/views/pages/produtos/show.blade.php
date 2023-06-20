@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Exibindo: {{ $produto->nome }}</h1>
</div>

<div class="card" style="width: 100%">
    <div class="card-body">
      <h5 class="card-title">{{ $produto->nome }}</h5>
      <h6 class="card-subtitle mb-2 text-body-secondary">{{ 'SKU ' . $produto->sku }}</h6>
      <p class="card-text" style="font-weight: bold;">Descrição: </p>
      <p class="card-text">{{ $produto->descricao }}</p>
      <p class="card-text" style="font-weight: bold;">Preço: </p>
      <p class="card-text" id="mascara_valor">{{ $produto->preco }}</p>
      <p class="card-text">{{ 'Marca ' . $produto->marca }}</p>
      <p class="card-text">{{ 'Gênero ' . $produto->genero }}</p>
      <p class="card-text" style="font-weight: bold;">Espeficicações: </p>
      <p class="card-text">{{ 'Material Externo em ' . $produto->calcado_material_externo }}</p>
      <p class="card-text">{{ 'Material Interno em ' . $produto->calcado_material_interno }}</p>
      <p class="card-text">{{ 'Material do Solado em ' . $produto->calcado_material_solado }}</p>
      <p class="card-text">{{ 'Tipo de Fechamento em ' . $produto->calcado_tipo_fechamento }}</p>
      <a href="{{ route('atualizar.produto', $produto->id) }}" class="card-link">Editar</a>
    </div>
</div>

@endsection