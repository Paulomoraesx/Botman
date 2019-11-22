@extends('template')
@section('conteudo_principal')
    <div id="banner-wrapper">
        <div id="banner" class="box container">
            <div class="row">
             <div class="col-7 col-12-medium">
              <h1>Aluno</h1>
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
						<td>{{$aluno['curso']}}</td>
						<td><a href="{{route('alunos.editar', ['id' => $aluno['id']])}}">Alterar</a></td>
						
					</tr>
			    <!-- DADOS [FIM] -->
			</table>
    </div>
</div>
</div>
</div>
</body>

@endsection