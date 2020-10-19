@extends('template')

@section('conteudo_principal')
<div id="page" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="title">
                <h2>Cadastro</h2>
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
            <form action="{{route('usuarios.salvar')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="boxCadastro">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Matricula') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text"
                                   class="form-control{{ $errors->has('matricula') ? ' is-invalid' : '' }}"
                                   name="matricula" value="{{ old('matricula') }}" required autofocus>

                            @if ($errors->has('matricula'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('matricula') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text"
                                   class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome"
                                   value="{{ old('nome') }}" required autofocus>

                            @if ($errors->has('nome'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address')
                            }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm
                            Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="usuario" class="col-md-4 col-form-label text-md-right">Usuario*:</label>
                        <div class="col-md-6">
                            <select name="tipo_cadastro" id="usuario" class="form-control">
                                <option label="Aluno" value="A"></option>
                                <option label="Professor" value="P"></option>
                            </select>
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
                        <a href="#" class="card-link" data-toggle="modal" data-target="#modalCadastroCurso">Novo Curso</a>
                        <button type="button" class="btn" title="teste" data-toggle="modal" data-target="#modalCadastroCurso">>Novo Curso</button>
                    </div>
                    <div><input type="submit" class="button" value="Cadastrar"/></div>
            </form>
        </div>
    </div>
    <!-- MODAL -->
    <div class="modal fade" id="modalCadastroCurso" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Curso</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>
                            x
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                        <form action="{{route('cursos.executarCadastro')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="boxCadastro">
                            <div class="form-group row">
                                <label for="descricao_curso"
                                       class="col-md-4 col-form-label text-md-right">Descrição*:</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="curso" name="descricao_curso"
                                           placeholder="Descrição do curso.."/>
                                </div>
                            </div>

                                </div>
                            <div>
                                <input type="submit" class="btn" style="background: green; color: white; border: black
 solid 1px; border-radius: 3px;" value="Cadastrar"/>
                            </div>
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection