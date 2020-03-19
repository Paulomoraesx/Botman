@extends('template')
@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h2>Alunos</h2>
		</div>
		<table class="table table-hover">
			    <thead>
			      <tr>
                    <th>Nome</th>
					<th>Matricula</th>
					<th>Curso</th>
			        <th width="10%">Opções</th>
			      </tr>
			    </thead>
			    <!-- DADOS -->
			    <tbody>
					@foreach ($alunos as $aluno)
					<tr>
                        <td>{{$aluno['nome']}}</td>
						<td>{{$aluno['matricula']}}</td>
						<td>{{$aluno->curso->descricao_curso}}</td>
						<td>
							<a href="{{route('alunos.visualizar', ['id' => $aluno['id']])}}" class="fa fa-eye" style="text-decoration:none"></a>
							<a href="{{route('alunos.editar', ['id' => $aluno['id']])}}" class="fa fa-pencil" style="text-decoration:none"></a>
							<a href="{{route('alunos.excluir',['id' => $aluno['id']])}}" class="fa fa-trash" style="text-decoration:none"></a>
						</td>
					</tr> 
					@endforeach
			    </tbody>
			    <!-- DADOS [FIM] -->
			</table>
</div>

@endsection