@extends('template')

@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h2>usuarios</h2>
		</div>
		<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>Nome</th>
					<th>E-mail</th>
					<th>Tipo Cadastro</th>
                    <th>Curso</th>
			        <th>Opções</th>
			      </tr>
			    </thead>
			    <!-- DADOS -->
			    <tbody>
					@foreach ($users->all() as $user)
					<tr>
						<td>{{$user['nome']}}</td>
						<td>{{$user['email']}}</td>
                        <td>{{$user['tipo_cadastro']}}</td>
						<td>{{$user->curso->descricao_curso}}</td>

						<td>
							<a href="{{route('usuarios.visualizar', ['id' => $user['id']])}}" class="fa fa-eye" style="text-decoration:none"></a>
							<a href="{{route('usuarios.editar', ['id' => $user['id']])}}" class="fa fa-pencil" style="text-decoration:none"></a>
							<a href="{{route('usuarios.excluir',['id' => $user['id']])}}" class="fa fa-trash" style="text-decoration:none"></a>
						</td>
					</tr>
					@endforeach
			    </tbody>
			    <!-- DADOS [FIM] -->
			</table>
</div>

@endsection