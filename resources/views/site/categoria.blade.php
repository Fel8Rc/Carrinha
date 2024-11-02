@extends('site.leyout')

@section('titulo', 'Produtos')

@section('conteudo')

<div class="row container">

    <h3>Categoria: {{ $categoria->nome }}</h3>
    @foreach ($produtos as $produto)
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ $produto->imagem }}">
                    <a href="{{ route('site.details', ['produto'=>$produto->id]) }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility </i></a>
                </div>
                <div class="card-content">
                    <span class="card-title">{{ $produto->nome }}</span>
                    <p>{{ Str::limit($produto->descricao, 45) }}</p>
                </div>
              </div>
        </div>
    @endforeach
</div>



@endsection