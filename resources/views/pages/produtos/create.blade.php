@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastrar Produto</h1>
</div>

<form>
    <div class="form-row">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" />
          </div>
          <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="text" class="form-control" id="valor" name="valor" />
          </div>
          <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
@endsection
