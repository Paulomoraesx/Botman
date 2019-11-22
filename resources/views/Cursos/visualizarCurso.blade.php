@extends('template')
@section('conteudo_principal')
    <div id="banner-wrapper">
        <div id="banner" class="box container">
            <div class="row">

              <h1>Cursos</h1>
			  <table class="table table-hover">
			    <thead>
			      <tr>
					<th>Descrição Curso</th>
					<th>Ações</th>
			      </tr>
			    </thead>
			    <!-- DADOS -->
			    <tbody>
					<tr>
						<td>{{$curso['descricao_curso']}}</td>
						<td><a href="{{route('cursos.editar', ['id' => $curso['id']])}}" class="fa fa-pencil" style="text-decoration:none"></a></td>
					</tr>
			    <!-- DADOS [FIM] -->
			</table>

</div>
</div>
</div>
</body>

@endsection