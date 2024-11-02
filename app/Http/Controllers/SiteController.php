<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

use App\Models\produto;
use Illuminate\Support\Facades\Gate;

class siteController extends Controller
{
    public function index()
    {
        //Buscar todos produtos
        $produtos = produto::paginate(3);

        return view('site.home', compact('produtos'));
    }

    public function details(produto $produto){

       // Gate::authorize('ver-produto', $produto);

        return view('site.details', ['produto'=> $produto]);
    } 

    public function categoria(categoria $categoria){

        $produto = produto::where('id_categoria', $categoria->id)->get();

        return view('site.categoria', ['produtos'=> $produto, 'categoria'=> $categoria]);
    } 

}
