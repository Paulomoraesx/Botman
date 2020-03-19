@extends('template')

@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h2>Cadastro da pergunta</h2>
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
		<form action="{{route('pergunta.executarCadastro')}}" method="post" enctype="multipart/form-data" >
		@csrf
		<div class="gallery">

				<div class="boxA">
					<label for="descricao-pergunta">Descrição*:</label>
					<input type="text" id="descricao-pergunta" name="descricao_pergunta" placeholder="Descrição da Pergunta.."/>
				</div>

				<div class="boxB">
					<label for="descricao-resposta">Resposta*:</label>
					<input type="text" id="descricao-resposta" name="descricao_resposta" placeholder="Descrição da resposta.."/>
				</div>

				<div class="boxC">
					<label for="materia">Matéria*:</label>
						<select name="materia_id" id="materia">
							@foreach($materias as $materia)
    						<option value="{{$materia->id}}">{{$materia->descricao_materia}}</option>
							@endforeach
						</select>
				</div>
				
			</div>	
			<div><input type="submit" class="button" value="Cadastrar"/></div>
		</form>
</div>
@endsection