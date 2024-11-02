@extends('site.leyout')

@section('titulo', 'Produtos')

@section('conteudo')

<div class="row container">
    @foreach ($produtos as $produto)
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ $produto->imagem }}">
                    @auth
                        <a href="{{ route('site.details', ['produto'=>$produto->id]) }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility </i></a>
                    @endauth
                </div>
                <div class="card-content">
                    <span class="card-title">{{ Str::limit($produto->nome, 20) }}</span>
                    <p>{{ Str::limit($produto->descricao, 60) }}</p>
                </div>
              </div>
        </div>
    @endforeach
</div>

<div class="row center">
    {{ $produtos->onEachSide(2)->links('custom.pagination') }}
</div>



@endsection