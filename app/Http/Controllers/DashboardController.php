<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $usuarios = User::all()->count();
        
        //Graficos do usuario
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT( *) as total'),
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();

        foreach($usersData as $user){
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        //Formatar dados para o grafico
        $userLabel = "'Comparativo de cadastro de usuarios'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);

        $usuarios = User::all()->count();
        
        //Graficos do usuario
        $catData = categoria::with('produto')->get();

        foreach($catData as $cat){
            $catNome[] = "'".$cat->nome."'";
            $catTotal[] = $cat->produto->count();
        }

        //Formatar dados para o grafico
        $catLabel = implode(', ', $catNome);
        $catTotal = implode(',', $catTotal);

        return view('admin.dashboard', 
        ['usuarios' => $usuarios, 
        'userLabel' => $userLabel, 
        'userAno' => $userAno, 
        'userTotal' => $userTotal,
        'catTotal' => $catTotal,
        'catLabel' => $catLabel
        ]);
    }

}
