@extends('template');
@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h2>Cadastro do professor</h2>
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
            <form action="{{route('professors.alterar', ['id' => $professors['id']])}}" method="post">
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
					<label for="cpf">CPF*:</label>
					<input class="componenteInputCadastro" type="text" id="cpf" name="cpf" placeholder="11111111111"/>
				</div>

				<div class="itemBoxCadastro">
					<label for="curso">Curso*:</label>
						<select name="curso_id" id="curso">
							@foreach($cursos as $curso)
							<option value="{{$curso->id}}">{{$curso->descricao_curso}}</option>
							@endforeach
						</select>
				</div>

				<div class="itemBoxCadastro">
					<label for="telefone">Telefone*:</label>
					<input class="componenteInputCadastro" type="text" id="telefone" name="telefone" placeholder="11-11111.1111"/>
				</div>
			</div>	
			<div><input type="submit" class="button" value="Alterar"/></div>
		</form>
</div>

@endsection