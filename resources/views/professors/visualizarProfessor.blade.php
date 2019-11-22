@extends('template')
@section('conteudo_principal')
    <div id="banner-wrapper">
        <div id="banner" class="box container">
            <div class="row">
              <h1>Professor</h1>
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
											<td>{{$professor['matricula']}}</td>
											<td>{{$professor['nome']}}</td>
											<td>{{$professor['cpf']}}</td>
											<td>{{$professor->curso->descricao_curso}}</td>
											<td>{{$professor['telefone']}}</td>
											<td><a href="{{route('professors.editar', ['id' => $professor['id']])}}" class="fa fa-pencil" style="text-decoration:none"></a></td>
										</tr>
									</tbody>
								</table>
						</div>
					</div>
				</div>

@endsection