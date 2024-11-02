@extends('site.leyout')

@section('titulo', 'Detalhes')

@section('conteudo')
    <div class="row container">
        <div class="col s12 m6"><br>
            <img src="{{ $produto->imagem }}" alt="Descicao" class="responsive-img">
        </div>

        <div class="col s12 m6">
            <h4>{{ $produto->nome }}</h4>
            <h5>AKZ {{ number_format($produto->preco, 2, ',', '.') }}</h5>
            <p>{{ $produto->descricao }}</p>
            <p>Postado por: {{ $produto->user->firstname }}</p>
            <p>Categoria: {{ $produto->categoria->nome }}</p>
            <form action="{{ route('site.addcarrinho') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">
                <input type="hidden" name="name" value="{{ $produto->nome }}">
                <input type="hidden" name="price" value="{{ $produto->preco }}">
                <input type="number" name="qnt" min="1" value="1">
                <input type="hidden" name="img" value="{{ $produto->imagem }}">
                <button class="btn orange btn-large">Comprar</button>
            </form>        
        </div>
    </div>

@endsection