@extends('template')
@section('conteudo_principal')

<div id="page" class="container">
		<div class="title">
			<h1>Dúvidas frequentes</h1>
		</div>
		<table class="table table-hover">
			    <thead>
			      <tr>
					<th>Descrição</th>
			        <th width="10%">Opções</th>
			      </tr>
			    </thead>
			    <!-- DADOS -->
			    <tbody>
					@foreach ($perguntas as $pergunta)
					<tr>
						<td>{{$pergunta['descricao_pergunta']}}</td>

						<td>
							<a href="{{route('pergunta.visualizar', ['id' => $pergunta['id']])}}" class="btn botao-login-estilo">Atender</a>
						</td>
					</tr>	
					@endforeach	 
			    </tbody>
			    <!-- DADOS [FIM] -->
			</table>
</div>

@endsection