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
					<th>Ações</th>
			      </tr>
			    </thead>
			    <!-- DADOS -->
			    <tbody>
					<tr>
						<td>{{$materia['descricao_materia']}}</td>
						<td>{{$materia->curso->descricao_curso}}</td>
						<td><a href="{{route('materia.editar', ['id' => $materia['id']])}}" class="fa fa-pencil" style="text-decoration:none"></a></td>
					</tr>
			    <!-- DADOS [FIM] -->
			</table>

</div>
</div>
</div>
</body>

@endsection