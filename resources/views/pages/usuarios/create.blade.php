@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastrar Usuário</h1>
</div>

<form class="form" method="POST" action="{{ route('cadastrar.usuario') }}">
    @csrf
    <div class="form-row">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" />
            @if ($errors->has('name'))
                <div class="invalid-feedback"> {{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" name="email" />
            @if ($errors->has('email'))
                <div class="invalid-feedback"> {{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="password" name="password" />
            @if ($errors->has('password'))
                <div class="invalid-feedback"> {{ $errors->first('password') }}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">GRAVAR</button>
  </form>
@endsection
