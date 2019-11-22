@extends('template')

@section('conteudo_principal')
<div id="banner-wrapper">
	<div id="banner" class="box container">
		<div class="row">
				<div id="Cadastro">
					<h3>Cadastro</h3>
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
					<form action="{{route('cursos.executarCadastro')}}" method="post" enctype="multipart/form-data" >
						@csrf
						<label for="descricao-curso">*Descrição Curso:</label>
						<input type="text" id="descricao-curso" name="descricao_curso" placeholder="Descrição do curso.."/>
						<br/>
						
						<br/>
						<div><input type="submit" class="btn-submit" value="Confirmar"/></div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection