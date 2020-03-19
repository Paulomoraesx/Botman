@extends('template')
@section('conteudo_principal')

<div id="page" class="container">
		<div class="title">
			<h1>Matérias</h1>
		</div>
			  <table class="table table-hover">
			    <thead>
			      <tr>
					<th>Matéria</th>
					<th>Curso</th>
					<th>Ações</th>
			      </tr>
			    </thead>
			    <!-- DADOS -->
			    <tbody>
					<tr>
						<td>{{$materia['descricao_materia']}}</td>
						<td>{{$materia->curso->descricao_curso}}</td>
						<td><a href="{{route('materia.editar', ['id' => $materia['id']])}}" class="fa fa-pencil" style="text-decoration:none"></a></td>
					</tr>
			    <!-- DADOS [FIM] -->
			</table>
</div>

@endsection