@extends('template')
@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h2>Cadastro do professor</h2>
		</div>
		<table class="table table-hover">
			    <thead>
			      <tr>
                    <th>Nome</th>
					<th>Matricula</th>
					<th>Curso</th>
			      </tr>
			    </thead>
			    <!-- DADOS -->
			    <tbody>
					<tr>
                        <td>{{$aluno['nome']}}</td>
						<td>{{$aluno['matricula']}}</td>
						<td>{{$aluno->curso->descricao_curso}}</td>
						<td><a href="{{route('alunos.editar', ['id' => $aluno['id']])}}" class="fa fa-pencil"></a></td>
						
					</tr>
				</tbody>
			    <!-- DADOS [FIM] -->
		</table>
</div>
 

@endsection