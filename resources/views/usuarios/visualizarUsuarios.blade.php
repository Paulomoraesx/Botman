@extends('template')
@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h2>professores</h2>
		</div>
		<table class="table table-hover">
			<thead>
			    <tr>
					<th>Matricula</th>
			        <th>Nome</th>
					<th>CPF</th>
					<th>Curso</th>
                   	<th>Telefone</th>
					<th>Ações</th>
			    </tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$user['matricula']}}</td>
					<td>{{$user['nome']}}</td>
                    <td>{{$user['tipo_cadastro']}}</td>
					<td>{{$user->curso->descricao_curso}}</td>
					<td><a href="{{route('usuarios.editar', ['id' => $user['id']])}}" class="fa fa-pencil" style="text-decoration:none"></a></td>
				</tr>
			</tbody>
		</table>
</div>
@endsection