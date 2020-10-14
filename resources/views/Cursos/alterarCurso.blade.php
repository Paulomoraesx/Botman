@extends('template');
@section('conteudo_principal')

<div id="page" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="title">
                <h2>Alteração de dados do curso</h2>
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
            <form action="{{route('cursos.alterar', ['id' => $curso['id']])}}" method="post">
                @csrf
                <div class="boxCadastro">

                    <div class="form-group row">
                        <label for="descricao_curso" class="col-md-4 col-form-label text-md-right">Descrição*:</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" id="curso" name="descricao_curso"
                                   placeholder="Descrição do curso.."/>
                        </div>
                    </div>

                </div>
                <div><input type="submit" class="button" value="Alterar"/></div>
            </form>
        </div>
    </div>
</div>
@endsection