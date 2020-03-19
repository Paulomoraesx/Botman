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

				<div class="boxB">
					<label for="login">Login:</label>
					<input type="text" id="login" name="login" placeholder="Login.."/>
				</div>

				<div class="boxB">
					<label for="senha">Senha:</label>
					<input type="password" id="senha" name="senha" placeholder="********"/>
				</div>

				<div class="boxB">
					<a href="{{route('professors.cadastrar')}}" style="text-decoration:none">
						<input type="button" class="btn-cadastrar" value="Cadastrar">
					</a>
				</div>

				<div class="boxC">
						<input type="submit" class="btn-login" value="Login"/>
				</div>
		</div>
		
		</form>
</div>

	<div id="banner" class="box container">
				<div id ="login-tam">
					<div id="Login">
						<h3 >Login</h3>

							@if (session('Erro!'))
							<!--LOGIN OU SENHA INCORRETA -->
								<div class="alert alert-danger">
								<strong>Erro!</strong>{{session('Erro!')}}
							<!--[FIM ]LOGIN OU SENHA INCORRETA -->
								</div>
							@endif

						<form action="{{route('logon')}}" method="post" enctype="multipart/form-data" >
							@csrf
									<label for="login">*Login:</label>
									<input type="text" id="login" name="login" placeholder="Login.."/>
									<br/>
									<label for="senha">*Senha:</label>
									<input type="password" id="senha" name="senha" placeholder="********"/>
									<br/>
									<div id="btns-login" class="box-footer">
										<div class="pull-right">
											<a href="{{route('professors.cadastrar')}}" style="text-decoration:none">
												<input type="button" class="btn-cadastrar" value="Cadastrar">
											</a>
											<input type="submit" class="btn-login" value="Login"/>
											
										</div>
									</div>
									<br/>
						</form>
					</div>
				</div>
			</div>
@endsection