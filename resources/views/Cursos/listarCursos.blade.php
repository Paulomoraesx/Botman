@extends('template')
@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h2 style="margin-right: 10%">Cursos</h2>
		</div>
		<table class="table table-hover">
			    <thead>
			      <tr>
					<th>Descrição curso</th>
			        <th width="10%">Opções</th>
			      </tr>
			    </thead>
			    <!-- DADOS -->
			    <tbody>
					@foreach ($curso as $curso)
					<tr>
						<td>{{$curso['descricao_curso']}}</td>
						<td>
							<a href="{{route('cursos.visualizar', ['id' => $curso['id']])}}" class="fa fa-eye" style="text-decoration:none"></a>
							<a href="{{route('cursos.editar', ['id' => $curso['id']])}}" class="fa fa-pencil" style="text-decoration:none"></a>
							<a href="{{route('cursos.excluir',['id' => $curso['id']])}}" class="fa fa-trash" style="text-decoration:none"></a>
						</td>
					</tr>	
					@endforeach	 
			    </tbody>
			    <!-- DADOS [FIM] -->
			</table>
			<div><a style="margin-right: 10%" href="{{route('materia.cadastrar')}}" class="button">Cadastre a matéria</a></div>

</div>

@endsection