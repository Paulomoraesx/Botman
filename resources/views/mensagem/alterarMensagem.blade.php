@extends('template');
@section('conteudo_principal')
<div id="page" class="container">
		<div class="title">
			<h2>Alterar Chatbot</h2>
		</div>
		<!--ERRO NO CADASTRO INCOMPLETO  -->
		@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<!--[FIM ]CADASTRO  INCOMPLETO    -->
            <form action="{{route('chatbot.alterar', ['id' => $chatbot['id']])}}" method="post">
			@csrf
			<div class="boxCadastro">
				<div class="itemBoxCadastro">
					<label for="nome">Nome do chatbot*:</label>
					<input class="componenteInputCadastro" type="text" id="nome" name="nome" placeholder="Nome do chatbot.."/>
				</div>
			</div>	
			<div><input type="submit" class="button" value="Alterar"/></div>
		</form>
</div>

@endsection