@extends('layout')

@section('Titulo')
    Detalhes
@endsection


@section('cabecalho')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Detalhes  de {{ $infos->nome }}</h1>
            <div class="d-flex flex-row-reverse">
                <a href="/candidatos/edit/{{ $infos->id }}" ><button type="button" class="btn btn-primary ml-2">Editar</button></a>
                <a href="{{ route('index') }}" ><button type="button" class="btn btn-secondary">Voltar</button></a>
            </div>
        </div>
    </div>
@endsection

@section('conteudo')
    <ul class="list-group">
            <li class="list-group-item">Id: {{ $infos->id }}</li>
            <li class="list-group-item">Nome: {{ $infos->nome }}</li>           
            <li class="list-group-item">Cep: {{ $infos->cep }}</li>
            <li class="list-group-item">Data Nascimento: {{ $infos->dataNascimento }}</li>         
    </ul>
@endsection