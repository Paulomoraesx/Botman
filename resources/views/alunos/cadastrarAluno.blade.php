@extends('template')

@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h2>Cadastro do aluno</h2>
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
		<form action="{{route('dadosAluno')}}" method="post" enctype="multipart/form-data" >
			@csrf
			<div class="boxCadastro">
				<div class="itemBoxCadastro">
					<label for="matricula">Matricula*:</label>
					<input class="componenteInputCadastro" type="text" id="matricula" name="matricula" placeholder="Matricula.."/>
				</div>

				<div class="itemBoxCadastro">
					<label for="nome">Nome*:</label>
					<input class="componenteInputCadastro" type="text" id="nome" name="nome" placeholder="Nome.."/>
				</div>

				<div class="itemBoxCadastro">
					<label for="curso">Curso*:</label>
						<select name="curso_id" id="curso">
							@foreach($cursos as $curso)
							<option value="{{$curso->id}}">{{$curso->descricao_curso}}</option>
							@endforeach
						</select>
				</div>
			</div>	
			<div><input type="submit" class="button" value="Cadastrar"/></div>
		</form>
</div>
@endsection