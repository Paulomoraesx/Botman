@extends('template')
@section('conteudo_principal')
    <div id="banner-wrapper">
        <div id="banner" class="box container">
            <div class="row">
              <h1>Professores</h1>
			  <table class="table table-hover">
			    <thead>
			      <tr>
					<th>Matricula</th>
			        <th>Nome</th>
					<th>CPF</th>
					<th>Curso</th>
                    <th>Telefone</th>
			        <th>Opções</th>
			      </tr>
			    </thead>
			    <!-- DADOS -->
			    <tbody>
					@foreach ($professors as $professor)
					<tr>
						<td>{{$professor['matricula']}}</td>
						<td>{{$professor['nome']}}</td>
						<td>{{$professor['cpf']}}</td>
						<td>{{$professor->curso->descricao_curso}}</td>
                        <td>{{$professor['telefone']}}</td>
						<td>
							<a href="{{route('professors.visualizar', ['id' => $professor['id']])}}" class="fa fa-eye" style="text-decoration:none"></a>
							<a href="{{route('professors.editar', ['id' => $professor['id']])}}" class="fa fa-pencil" style="text-decoration:none"></a>
							<a href="{{route('professors.excluir',['id' => $professor['id']])}}" class="fa fa-trash" style="text-decoration:none"></a>
						</td>
					</tr>	
					@endforeach	 
			    </tbody>
			    <!-- DADOS [FIM] -->
			</table>
</div>
</div>
</div>
</body>

@endsection