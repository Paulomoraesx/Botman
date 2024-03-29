@extends('template')
@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h2>Chatbots</h2>
		</div>
		<table class="table table-hover">
			    <thead>
			      <tr>
					<th>Nome</th>
			        <th>Matéria</th>
			        <th>Opções</th>
			      </tr>
			    </thead>
			    <!-- DADOS -->
			    <tbody>
					@foreach ($chatbot as $chatbot)
					<tr>
						<td>{{$chatbot['titulo']}}</td>
						<td>{{$chatbot->materia->descricao_materia}}</td>
						<td>
                            @if(Auth::user()->tipo_cadastro == 'A')
                            <a href="{{route('chatbot.acessarChatBot',['id' => $chatbot['id']])}}" style="text-decoration:none">Acessar ChatBot</a>
                            @endif
                            @if(Auth::user()->tipo_cadastro == 'P')
                            <a href="{{route('duvida.listarDuvidaChatbot', ['id' => $chatbot['id']])}}" style="text-decoration:none">Ver Dúvidas</a>
							<a href="{{route('chatbot.editar', ['id' => $chatbot['id']])}}" class="fa fa-pencil" style="text-decoration:none"></a>
							<a href="{{route('chatbot.excluir',['id' => $chatbot['id']])}}" class="fa fa-trash" style="text-decoration:none"></a>
                            <a href="{{route('mensagem.cadastrar', ['id' => $chatbot['id']])}}" style="text-decoration:none">Gerenciar Fluxo de mensagens</a>
                            @endif
						</td>
					</tr>	
					@endforeach
			    </tbody>
			    <!-- DADOS [FIM] -->
			</table>
</div>

@endsection