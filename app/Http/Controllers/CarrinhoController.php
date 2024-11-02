<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens = Cart::content();

        return view('site.carrinho', ['itens'=> $itens]);
    }

    public function adicionarcarrinho(Request $request){
        Cart::add([
            'id'=>$request->id,
            'name'=>$request->name,
            'qty'=>abs($request->qnt),
            'price'=>$request->price,
            'weight' => 1,
            'options'=> [
                'image'=>$request->img
                ]
        ]);

        return redirect()->route('site.carrinho')->with('message', 'Produto adicionado no carrinho com sucesso');
    }

    public function removercarrinho(Request $request){

        Cart::remove($request->rowId);

        return redirect()->route('site.carrinho')->with('aviso', 'Produto removido no carrinho com sucesso');
    }

    public function atualizarcarrinho(Request $request){

        Cart::update($request->rowId, ['qty'=>abs($request->quantity)]);
 
        return redirect()->route('site.carrinho')->with('message', 'Produto atualizado no carrinho com sucesso');
    }

    public function limparcarrinho(){
        Cart::destroy();

        return redirect()->route('site.carrinho')->with('aviso', 'carrinho Vazio');
    }

}
