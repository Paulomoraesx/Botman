@extends('template')

@section('conteudo_principal')

<div id="page" class="container">
    <div class="title">
        <h2>Cadastro de novo Chatbot</h2>
    </div>
    <!--ERRO NO CADASTRO INCOMPLETO  -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!--[FIM ]CADASTRO  INCOMPLETO    -->
    <form action="{{route('chatbot.salvar')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="boxCadastro">
            <div class="itemBoxCadastro">
                <label for="titulo">Titulo*:</label>
                <input class="componenteInputCadastro" type="text" id="titulo" name="titulo"
                       placeholder="Monitor da materia.."/>
            </div>

            <div class="itemBoxCadastro">
                <label for="materia">Matéria*:</label>
                <select name="materia_id" id="materia">
                    @foreach($materias as $materia)
                    <option value="{{$materia->id}}">{{$materia->descricao_materia}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div><input type="submit" class="button" value="Cadastrar"/></div>
    </form>
</div>


@endsection