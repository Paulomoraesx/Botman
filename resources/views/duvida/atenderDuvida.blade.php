@extends('template')
@section('conteudo_principal')

<div id="page" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="title">
                <h2>Cadastro da Resposta</h2>
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
            <form id="formResposta" action="{{route('duvida.executarCadastro')}}" method="post"
                  enctype="multipart/form-data">
                @csrf

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Duvida</th>
                        <td>{{$pergunta['descricao_pergunta']}}</td>
                    </tr>
                    </thead>
                </table>
                <div class="boxCadastro">
                    <div class="form-group row">
                        <label for="descricao-duvida" class="col-md-4 col-form-label text-md-right">{{
                            __('Descricao da Resposta') }}</label>
                        <div class="col-md-6">
                                <textarea class="form-control" id="descricao-resposta" rows="4" cols="50"
                                          form="formResposta" name="descricao_resposta"></textarea>
                        </div>
                    </div>

                </div>
                <div><input type="submit" class="btn botao-login-estilo" value="Cadastrar"/></div>
            </form>
        </div>
    </div>
</div>

@endsection