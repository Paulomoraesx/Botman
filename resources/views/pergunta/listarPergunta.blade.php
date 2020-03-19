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
			        <th width="10%">Opções</th>
			      </tr>
			    </thead>
			    <!-- DADOS -->
			    <tbody>
					@foreach ($perguntas as $pergunta)
					<tr>
						<td>{{$pergunta['descricao_pergunta']}}</td>
						<td>{{$pergunta['descricao_resposta']}}</td>
						<td>{{$pergunta->materia->descricao_materia}}</td>
						<td>
							<a href="{{route('pergunta.visualizar', ['id' => $pergunta['id']])}}" class="fa fa-eye" style="text-decoration:none"></a>
							<a href="{{route('pergunta.editar', ['id' => $pergunta['id']])}}" class="fa fa-pencil" style="text-decoration:none"></a>
							<a href="{{route('pergunta.excluir',['id' => $pergunta['id']])}}" class="fa fa-trash" style="text-decoration:none"></a>
						</td>
					</tr>	
					@endforeach	 
			    </tbody>
			    <!-- DADOS [FIM] -->
			</table>
</div>

@endsection