@extends('template')

@section('conteudo_principal')

<div id="page" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                    <div class="form-group row">
                        <label for="titulo" class="col-md-4 col-form-label text-md-right">Titulo*:</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" id="titulo" name="titulo"
                                   placeholder="Monitor da materia.."/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="materia" class="col-md-4 col-form-label text-md-right">Matéria*:</label>
                        <div class="col-md-6">
                            <select name="materia_id" id="materia" class="form-control">
                                @foreach($materias as $materia)
                                <option value="{{$materia->id}}">{{$materia->descricao_materia}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div><input type="submit" class="button" value="Cadastrar"/></div>
            </form>
        </div>
    </div>
</div>


@endsection