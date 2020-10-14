@extends('template')

@section('conteudo_principal')

<div id="pagina" class="container">
		<div class="title">
			<h1>Login</h1>
		</div>
		@if (session('Erro!'))
			<!--LOGIN OU SENHA INCORRETA -->
			<div class="alert alert-danger">
				<strong>Erro!</strong>{{session('Erro!')}}
			<!--[FIM ]LOGIN OU SENHA INCORRETA -->
			</div>
		@endif

		<form action="{{route('inicio')}}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="gallery">

			<div class="boxLogin">
				<div style="flex: 1; margin-bottom: 15px;">
					<label for="email">Matricula:</label>
					<input class="componenteInputLogin1" type="text" id="email" name="email" placeholder="E-mail.."/>
				</div>
				<div style="flex: 1; margin-bottom: 5%">
					<label for="senha">Senha:</label>
					<input class="componenteInputLogin2" type="password" id="senha" name="senha" placeholder="********"/>
				</div>
                <div style="flex: 1; margin-bottom: 5%">
                    <label ></label>
                </div>

			</div>
					<div class="btns-login">
							<input type="submit" class="btn-login" value="Login"/>
							<a href="{{route('usuarios.cadastrar')}}" style="text-decoration:none">
								<input type="button" class="btn-cadastrar" value="Cadastrar">
							</a>				
				</div>
		</div>
		
		</form>
</div>

	
@endsection