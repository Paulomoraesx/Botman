@extends('template');
@section('conteudo_principal')

<div id="page" class="container">
		<div class="title">
			<h2>Alteração de dados da matéria</h2>
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
		<form action="{{route('materia.alterar', ['id' => $materia['id']])}}" method="post">
		@csrf
		<div class="gallery">

				<div class="boxA">
					<label for="descricao-materia">Descrição*:</label>
					<input type="text" id="descricao-materia" name="descricao_materia" placeholder="Descrição da Matéria.."/>
				</div>

				<div class="boxB">
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