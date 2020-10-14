@extends('template');
@section('conteudo_principal')
<div id="page" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
		<div class="title">
			<h2>Alterar</h2>
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
            <form action="{{route('usuarios.alterar', ['id' => $users['id']])}}" method="post">
			@csrf

                <div class="form-group row">
                    <label for="matricula" class="col-md-4 col-form-label text-md-right">Matricula</label>

                    <div class="col-md-6">
                        <input id="matricula" type="text" class="form-control" placeholder="123456"
                               name="matricula" value="{{ old('matricula') }}" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                    <div class="col-md-6">
                        <input id="nome" type="text"  placeholder="Nome.."
                               class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required autofocus>

                        @if ($errors->has('nome'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" placeholder="teste@teste.com"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                        <input id="password" placeholder="*******"
                               type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
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
                        <select name="curso_id" id="curso" class="form-control{{ $errors->has('curso_id') ? ' is-invalid' : '' }}">
                            @foreach($cursos as $curso)
                            <option value="{{$curso->id}}">{{$curso->descricao_curso}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

			<div><input type="submit" class="button" value="Alterar"/></div>
		</form>
</div>
    </div>
</div>

@endsection