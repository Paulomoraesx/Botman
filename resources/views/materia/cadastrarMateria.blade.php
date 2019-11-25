@extends('template')

@section('conteudo_principal')
<div id="banner-wrapper">
	<div id="banner" class="box container">
		<div class="row">
				<div id="Cadastro">
					<h3>Cadastrar Matéria</h3>
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
					<form action="{{route('materia.executarCadastro')}}" method="post" enctype="multipart/form-data" >
						@csrf
						<label for="descricao-materia">*Descrição Matéria:</label>
						<input type="text" id="descricao-materia" name="descricao_materia" placeholder="Descrição da Matéria.."/>
						<br/>
						<label for="curso">*Curso:</label>
						<select name="curso_id" id="curso">
						@foreach($cursos as $curso)
    					<option value="{{$curso->id}}">{{$curso->descricao_curso}}</option>
						@endforeach
						</select>
						
						<br/>
						<div><input type="submit" class="btn-submit" value="Confirmar"/></div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection