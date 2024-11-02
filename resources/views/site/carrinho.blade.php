@extends('site.leyout')

@section('titulo', 'Produtos')

@section('conteudo')

<div class="row container">

    @if ($message = Session::get('message'))
   
          <div class="card green">
            <div class="card-content white-text">
              <span class="card-title">Parabens</span>
              <p> {{ $message }} </p>
            </div>
          </div>
    @endif

    @if ($message = Session::get('aviso'))
   
          <div class="card orange">
            <div class="card-content white-text">
              <span class="card-title">Aviso!</span>
              <p> {{ $message }} </p>
            </div>
          </div>
    @endif

    <h3>Carrinho: {{ $itens->count() }} Produtos</h3>
    @if ($itens->count() == 0)
    <div class="card orange">
        <div class="card-content white-text">
          <span class="card-title">Sua carrinha esta vazia</span>
          <p> Aproveite as promoções </p>
        </div>
      </div>
    @else
        <table class="striped">
            <thead>
            <tr>
                <th></th>
                <th class="center">Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($itens as $item)
            <tr>
                <td><img src="{{ $item->options->image }}" alt="s" width="70" class="responsive-img circle"></td>
                <td>{{ $item->name }}</td>
                <td>{{ number_format($item->price, 2, ',', '.') }}</td>
                <form action="{{ route('site.atualizarcarrinho') }}" method="POST" enctype="multipart/form-data">
                <td><input type="number" style="width: 50px" name="quantity" value="{{ $item->qty }}"></td>
                <td>
                        @csrf
                        <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                        <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                    </form>

                    <form action="{{ route('site.remcarrinho') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                        <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <h5>Total: AKZ {{ number_format(Cart::total(), 2, ',', '.') }}</h5>

    @endif
    <div class="row container center">
        <a href="{{ route('site.index') }}" class="btn waves-effect waves-light blue">Continuar comprar<i class="material-icons right">arrow_back</i></a>
        <a href="{{ route('site.limparcarrinho') }}" class="btn waves-effect waves-light blue">Limpar carrinho<i class="material-icons right">clear</i></a>
        <button class="btn waves-effect waves-light green">Finalizar Pedido<i class="material-icons right">check</i></button>
    </div>
</div>



@endsection