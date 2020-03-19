@extends('template')

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
		<form action="{{route('dados')}}" method="post" enctype="multipart/form-data" >
			@csrf
			<div class="gallery">
				<div class="boxA">
					<label for="matricula">Matricula*:</label>
					<input type="text" id="matricula" name="matricula" placeholder="Matricula.."/>
				</div>

				<div class="boxB">
					<label for="nome">Nome*:</label>
					<input type="text" id="nome" name="nome" placeholder="Nome.."/>
				</div>
				
				<div class="boxA">
					<label for="cpf">CPF*:</label>
					<input type="text" id="cpf" name="cpf" placeholder="11111111111"/>
				</div>

				<div class="boxB">
					<label for="curso">Curso*:</label>
						<select name="curso_id" id="curso">
							@foreach($cursos as $curso)
							<option value="{{$curso->id}}">{{$curso->descricao_curso}}</option>
							@endforeach
						</select>
				</div>

				<div class="boxC">
					<label for="telefone">Telefone*:</label>
					<input type="text" id="telefone" name="telefone" placeholder="11-11111.1111"/>
				</div>
			</div>	
			<div><input type="submit" class="button" value="Cadastrar"/></div>
		</form>
	</div>


@endsection