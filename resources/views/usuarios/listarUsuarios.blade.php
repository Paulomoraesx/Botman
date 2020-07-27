@extends('template')
@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h2>usuarioes</h2>
		</div>
		<table class="table table-hover">
			    <thead>
			      <tr>
					<th>Matricula</th>
			        <th>Nome</th>
					<th>E-mail</th>
					<th>Tipo</th>
                    <th>Curso</th>
			        <th>Opções</th>
			      </tr>
			    </thead>
			    <!-- DADOS -->
			    <tbody>
					@foreach ($usuarios as $usuario)
					<tr>
						<td>{{$usuario['matricula']}}</td>
						<td>{{$usuario['nome']}}</td>
						<td>{{$usuario['email']}}</td>
                        <td>{{$usuario['tipo_cadastro']}}</td>
						<td>{{$usuario->curso->descricao_curso}}</td>

						<td>
							<a href="{{route('usuarios.visualizar', ['id' => $usuario['id']])}}" class="fa fa-eye" style="text-decoration:none"></a>
							<a href="{{route('usuarios.editar', ['id' => $usuario['id']])}}" class="fa fa-pencil" style="text-decoration:none"></a>
							<a href="{{route('usuarios.excluir',['id' => $usuario['id']])}}" class="fa fa-trash" style="text-decoration:none"></a>
						</td>
					</tr>	
					@endforeach	 
			    </tbody>
			    <!-- DADOS [FIM] -->
			</table>
</div>

@endsection