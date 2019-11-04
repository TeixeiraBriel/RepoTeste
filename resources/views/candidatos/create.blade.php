@extends('layout')




@section('script')
<script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('city').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            if (conteudo.uf != "MG" && conteudo.uf != "SP")
            {            
                document.getElementById('uf').value="";
            }
            else
            {
                document.getElementById('city').value=(conteudo.localidade);
                document.getElementById('uf').value=(conteudo.uf);
            }
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('city').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

</script>
@endsection


@section('Titulo')
    Novo Candidato
@endsection


@section('cabecalho')
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Novo Candidato</h1>
        <div class="d-flex flex-row-reverse">
            <a href="{{ route('index') }}" ><button type="button" class="btn btn-primary">Cancelar</button></a>
        </div>
    </div>
    </div>    
@endsection

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container ">
        <form method="post">
        @csrf
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Nome" name="name">
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <input type="string" class="form-control" placeholder="CEP" name="zip_code" onblur="pesquisacep(this.value);">
                </div>
            </div>  
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <input type="date" class="form-control" placeholder="Data de Nascimento" name="date_of_birth">
                </div>
            </div>              
            <div class="row justify-content-md-center d-none">
                <div class="col-md-6">
                    <input type="string" class="form-control" placeholder="Cidade" name="city" id="city">
                </div>
            </div>  
            <div class="row justify-content-md-center d-none">
                <div class="col-md-6">
                    <input type="string" class="form-control" placeholder="Estado" name="uf" id="uf">
                </div>
            </div>          
            <div class="row justify-content-md-center">
                <button type="submit" class="btn btn-primary">Adicionar</button>    
            </div>

            

        </form>    
    </div>

@endsection