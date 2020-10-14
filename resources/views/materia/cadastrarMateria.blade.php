@extends('template')

@section('conteudo_principal')

<div id="page" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="title">
                <h2>Cadastro da matéria</h2>
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
            <form action="{{route('materia.executarCadastro')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="boxCadastro">

                    <div class="form-group row">
                        <label for="descricao-materia" class="col-md-4 col-form-label text-md-right">Descrição*:</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" id="descricao-materia" name="descricao_materia"
                                   placeholder="Descrição da Matéria.."/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="curso" class="col-md-4 col-form-label text-md-right">Curso*:</label>
                        <div class="col-md-6">
                            <select name="curso_id" id="curso"
                                    class="form-control{{ $errors->has('curso_id') ? ' is-invalid' : '' }}">
                                @foreach($cursos as $curso)
                                <option value="{{$curso->id}}">{{$curso->descricao_curso}}</option>
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