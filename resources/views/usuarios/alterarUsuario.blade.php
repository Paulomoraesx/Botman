@extends('template');
@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h2>Cadastro do usuario</h2>
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
            <form action="{{route('usuarios.alterar', ['id' => $usuarios['id']])}}" method="post">
			@csrf

                <div class="itemBoxCadastro">
                    <label for="nome">Nome*:</label>
                    <input class="componenteInputCadastro" type="text" id="nome" name="nome" placeholder="Nome.."/>
                </div>
                <div class="itemBoxCadastro">
                    <label for="senha">Senha*:</label>
                    <input class="componenteInputCadastro" type="password" id="senha" name="senha" placeholder="*******"/>
                </div>

                <div class="itemBoxCadastro">
                    <label for="email">Email*:</label>
                    <input class="componenteInputCadastro" type="text" id="email" name="email" placeholder="teste@teste.com"/>
                </div>

                <div class="itemBoxCadastro">
                    <label for="usuario">Usuario*:</label>
                    <select name="tipo_cadastro" id="usuario">
                        <option label="Aluno" value="A"></option>
                        <option label="Professor" value="P"></option>
                    </select>
                </div>

                <div class="itemBoxCadastro">
                    <label for="curso">Curso*:</label>
                    <select name="curso_id" id="curso">
                        @foreach($materias as $materia)
                        <option value="{{$materia->id}}">{{$materia->descricao_curso}}</option>
                        @endforeach
                    </select>
                </div>


			<div><input type="submit" class="button" value="Alterar"/></div>
		</form>
</div>

@endsection