{{-- Extends da index --}}
@extends('index')

    @section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>
    </div>
    <div>
        <form action="{{ route('produto.index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o nome" />
            <button> Pesquisar </button>
            <a type="button" href="{{ route('cadastrar.produto') }}" class="btn btn-success float-end">ADICIONAR PRODUTO</a>
        </form>

        <div class="table-responsive mt-4">
            @if ($findProduto->isEmpty())
                <h2>Nenhum produto encontrado</h2>
            @else
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Cód.</th>
                    <th>Foto</th>
                    <th>SKU</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findProduto as $produto)
                <tr>
                    <td class="align-middle">{{ $produto->id }}</td>
                    <td class="align-middle">
                        @if (sizeof($produto->fotos)>0)
                            @php 
                                $fotoPath = str_replace('public/', '', $produto->fotos[0]->path);
                            @endphp
                            <img src="{{ 'storage/' . $fotoPath }}" alt="{{ $produto->fotos[0]->nome }}" class="img-thumbnail" style="height: 75px; width: 75px;" />
                        @endif
                    </td>
                    <td class="align-middle">{{ $produto->sku }}</td>
                    <td class="align-middle">{{ $produto->nome }}</td>
                    <td class="align-middle">{{ 'R$' . ' ' . number_format($produto->preco, 2, ',', '.') }}</td>
                    <td class="align-middle">
                        <a href="{{ route('visualizar.produto', $produto->id) }}" class="btn btn-warning btn-sm">
                            Ver
                        </a>

                        <a href="{{ route('atualizar.produto', $produto->id) }}" class="btn btn-light btn-sm">
                            Editar
                        </a>
                        
                        <form action="{{ route('produto.delete', $produto->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm ('Tem certeza que deseja excluir este produto?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            @endif
        </div>
@endsection
