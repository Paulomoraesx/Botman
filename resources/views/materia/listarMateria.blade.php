@extends('template')
@section('conteudo_principal')
    <div id="banner-wrapper">
        <div id="banner" class="box container">
            <div class="row">
              <h1>Matérias</h1>
			  <table class="table table-hover">
			    <thead>
			      <tr>
					<th>Matéria</th>
					<th>Curso</th>
			        <th width="10%">Opções</th>
			      </tr>
			    </thead>
			    <!-- DADOS -->
			    <tbody>
					@foreach ($materias as $materia)
					<tr>
						<td>{{$materia['descricao_materia']}}</td>
						<td>{{$materia->curso->descricao_curso}}</td>
						<td>
							<a href="{{route('materia.visualizar', ['id' => $materia['id']])}}" class="fa fa-eye" style="text-decoration:none"></a>
							<a href="{{route('materia.editar', ['id' => $materia['id']])}}" class="fa fa-pencil" style="text-decoration:none"></a>
							<a href="{{route('materia.excluir',['id' => $materia['id']])}}" class="fa fa-trash" style="text-decoration:none"></a>
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