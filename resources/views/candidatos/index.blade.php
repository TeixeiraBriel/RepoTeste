@extends('layout')
<?php use Carbon\Carbon; ?>

@section('Titulo')
    Entrada
@endsection


@section('cabecalho')
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Candidatos</h1>
        <div class="d-flex flex-row-reverse">
            <a href="{{ route('createCandidato') }}" ><button type="button" class="btn btn-primary">Novo</button></a>
        </div>
    </div>
    </div>
    
@endsection

@section('conteudo')
    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif

    <div class="card-columns ">
        @foreach($candidatos as $candidato)
                <div class="card">
                <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                    <div class="card-body">
                        <h5 class="card-title">{{$candidato->name}}</h5>
                        <p class="card-text">{{$candidato->city}}</p>
                        <p class="card-text">{{$teste = Carbon::parse($candidato->date_of_birth)->age}} Anos</p>          
                    </div>
                </div>

        @endforeach
    </div>

@endsection

