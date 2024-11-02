<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\produto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Buscar todos produtos
        $produtos = produto::paginate(5);
        $categorias = categoria::all();

        return view('admin.produtos', compact('produtos', 'categorias'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = $request->all();

        if($request->imagem){
            $produto['imagem'] = $request->{'imagem'}->store('produtos');
        }

        $produto['slug'] = Str::slug($request->nome);

        $produto = Produto::create($produto);

        return redirect()->route('admin.produtos')->with('sucesso', 'Cadastro com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produto $produto)
    {
        $produto->delete();

        return redirect()->route('admin.produtos')->with('sucesso', 'produto excluido com sucesso');
    }
}
