<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidato;
use App\Http\Requests\candidatosRequest;

class candidatosController extends Controller
{
    public function index(Request $request){
        $candidatos = Candidato::query()->orderBy('id')->get();  
        $mensagem = $request->session()->get('mensagem');



        return view('candidatos.index', compact('candidatos','mensagem'));
    }

    public function create(){
        return view('candidatos.create');
    }

    public function store(candidatosRequest $request){      
        $candidatos = Candidato::create($request->all()); 

        $request->session()->flash('mensagem',"Candidato {$candidatos->name} criado com sucesso.");
        return redirect(route('index'));
    }
}