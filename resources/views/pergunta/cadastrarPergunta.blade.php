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
					<form action="{{route('pergunta.executarCadastro')}}" method="post" enctype="multipart/form-data" >
						@csrf
						<label for="descricao-pergunta">*Descrição Pergunta:</label>
						<input type="text" id="descricao-pergunta" name="descricao_pergunta" placeholder="Descrição da Pergunta.."/>
						<br/>
						<label for="descricao-resposta">*Resposta:</label>
						<input type="text" id="descricao-resposta" name="descricao_resposta" placeholder="Descrição da resposta.."/>
						<br/>
						<label for="materia">*Matéria:</label>
						<select name="materia_id" id="materia">
						@foreach($materias as $materia)
    					<option value="{{$materia->id}}">{{$materia->descricao_materia}}</option>
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