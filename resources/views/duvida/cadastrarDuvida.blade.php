@extends('template')

@section('conteudo_principal')
<div id="page" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="title">
                <h2>Cadastro da sua dúvida</h2>
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
            <form id="formDuvida" action="{{route('duvida.executarCadastro')}}" method="post"
                  enctype="multipart/form-data">
                @csrf

                <div class="boxCadastro">
                    <div class="form-group row">
                        <label for="descricao-duvida" class="col-md-4 col-form-label text-md-right">{{
                            __('Descricao da dúvida') }}</label>
                        <div class="col-md-6">
                                <textarea class="form-control" id="descricao-duvida" rows="4" cols="50"
                                          form="formDuvida" name="descricao_duvida"></textarea>
                        </div>
                    </div>

                </div>
                <div><input type="submit" class="btn botao-login-estilo" value="Cadastrar"/></div>
            </form>
        </div>
    </div>
</div>
@endsection