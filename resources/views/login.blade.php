@extends('template')

@section('conteudo_principal')

<div id="page" class="container">
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

		<form action="{{route('logon')}}" method="post" enctype="multipart/form-data" >
		@csrf
		<div class="gallery">

				<div class="boxA">
					<label for="login">Login:</label>
					<input type="text" id="login" name="login" placeholder="Login.."/>
				</div>

				<div class="boxB">
					<label for="senha">Senha:</label>
					<input type="password" id="senha" name="senha" placeholder="********"/>
				</div>
				<div class="boxC">
					<div id="btns-login" class="box-footer">
						<div class="pull-center">
							<input type="submit" class="btn-login" value="Login"/>
							<a href="{{route('professors.cadastrar')}}" style="text-decoration:none">
								<input type="button" class="btn-cadastrar" value="Cadastrar">
							</a>													
						</div>
					</div>
				</div>
		</div>
		
		</form>
</div>

	
@endsection