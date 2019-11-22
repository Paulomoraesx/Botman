@extends('template')

@section('conteudo_principal')
<div id="banner-wrapper">
	<div id="banner" class="box container">
		<div class="row">
			<div class="col-7 col-12-medium">
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
					<form action="{{route('dadosAluno')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        
						<label for="nome">*Nome:</label>
						<input type="text" id="nome" name="nome" placeholder="Nome.."/>
						<br/>

						<label for="matricula">*Matricula:</label>
						<input type="text" id="matricula" name="matricula" placeholder="Matricula.."/>
						<br/>					

						<label for="curso">*Curso:</label>
						<select name="curso_id" id="curso">
						@foreach($cursos as $curso)
    					<option value="{{$curso->id}}">{{$curso->descricao_curso}}</option>
						@endforeach
						</select>
						
												
						<br/>
						<div><input type="submit" class="btn-submit" value="Confirmar!"/></div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection