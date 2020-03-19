@extends('template');
@section('conteudo_principal')

<div id="page" class="container">
		<div class="title">
			<h2>Alteração de dados do curso</h2>
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
			<form action="{{route('cursos.alterar', ['id' => $curso['id']])}}" method="post">
			@csrf
			<div class="gallery">

				<div class="boxA"></div>

				<div class="boxB">
					<label for="descricao_curso">Descrição*:</label>
					<input type="text" id="matricula" name="descricao_curso" placeholder="Descrição do curso.."/>
				</div>
				
			</div>	
			<div><input type="submit" class="button" value="Cadastrar"/></div>
			</form>
</div>
@endsection