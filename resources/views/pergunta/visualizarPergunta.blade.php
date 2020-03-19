@extends('template')
@section('conteudo_principal')

<div id="page" class="container">
		<div class="title">
			<h1>Perguntas</h1>
		</div>
			<table class="table table-hover">
			    <thead>
			      <tr>
						<th>Pergunta</th>
					<th>Resposta</th>
					<th>Matéria</th>
					<th>Ações</th>
			      </tr>
			    </thead>
			    <!-- DADOS -->
			    <tbody>
					<tr>
						<td>{{$pergunta['descricao_pergunta']}}</td>
						<td>{{$pergunta['descricao_resposta']}}</td>
						<td>{{$pergunta->materia->descricao_materia}}</td>
						<td><a href="{{route('pergunta.editar', ['id' => $pergunta['id']])}}" class="fa fa-pencil" style="text-decoration:none"></a></td>
					</tr>
			    <!-- DADOS [FIM] -->
			</table>
</div>

@endsection