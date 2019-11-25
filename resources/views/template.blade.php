<!DOCTYPE HTML>
<html>
<head>
	<title>Robô Monitor</title>
	<meta charset="utf-8" />
	<!-- JQUERY -->
	<script src="{{asset('assets/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>	
	
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="is-preload homepage">

			<header id="header" class="container" style="margin-top:2%">
				<!-- Logo -->
				<div id="logo">
					<h1><a href="{{route('inicio')}}">Robô Monitor Cesmac</a></h1>
				</div>
				
				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="current"><a href="{{route('inicio')}}">Inicio</a></li>
						<li>
							<a>Cadastros</a>
							<ul>
								<li><a href="{{route('professors.cadastrar')}}">Professor</a></li>
								<li><a href="{{route('alunos.cadastrar')}}">Aluno</a></li>
								<li><a href="{{route('cursos.cadastrar')}}">Cursos</a></li>
								<li><a href="{{route('materia.cadastrar')}}">Matéria</a></li>
								<li><a href="{{route('pergunta.cadastrar')}}">Pergunta</a></li>
							</ul>
						</li>
						<li>
							<a>Listar</a>
							<ul>
								<li><a href="{{route('professors.listar')}}">Professor</a></li>
								<li><a href="{{route('alunos.listar')}}">Aluno</a></li>
								<li><a href="{{route('cursos.listar')}}">Cursos</a></li>
								<li><a href="{{route('materia.listar')}}">Matéria</a></li>
								<li><a href="{{route('pergunta.listar')}}">Pergunta</a></li>
							</ul>
						</li>
						<li>
						<a href="{{route('professors.listar')}}">BOTMAN</a>
							<ul>
								<li><a href="/botman/tinker">Open</a></li>
							</ul>
						</li>
						<li><a href="{{route('login')}}">Em Contrução</a></li>
						<li><a href="Contato.html">Em Contrução</a></li>
					</ul>
				</nav>
				
			</header>
				
				<!-- Main -->
				<div class="container">
					<!-- CONTEUDO PRINCIPAL [INICIO]-->
					@yield('conteudo_principal')
					<!-- CONTEUDO PRINCIPAL [FIM]-->
				</div>

					<footer id="footer" class="container" style="margin-top:50px">
						<div class="row">
							<div class="col-3 col-6-medium col-12-small">
								
								<!-- Links -->
								<section class="widget links">
									<h3>Criador</h3>
									<ul class="style2">
										<li><a href="#">Eu</a></li>
									</ul>
								</section>
								
							</div>
							<div class="col-3 col-6-medium col-12-small">
								
								<!-- Links -->
								<section class="widget links">
									<h3>Fornecedores</h3>
									<ul class="style2">
										<li><a href="#">O Cesmac</a></li>
									</ul>
								</section>
								
							</div>
							<div class="col-3 col-6-medium col-12-small">
								
								<!-- Links -->
								<section class="widget links">
									<h3>Apoiadores</h3>
									<ul class="style2">
										<li><a href="#">Também o Cesmac</a></li>
									</ul>
								</section>
								
							</div>
							<div class="col-3 col-6-medium col-12-small">
								
								<!-- Contact -->
								<section class="widget contact">
									<h3>Contact Us</h3>
									<ul>
									<p>Centro Universitário Cesmac
									<br />
										Maceió,AL
										<br/>
									(82)1111-1111</p>
									</ul>
									</section>
									
								</div>
							</div>
							<div class="row">
										<ul class="menu">
											<li>Todos os direitos reservados por mim</li>
										</ul>
							</div>
						</footer>
				
				<!-- Scripts -->

			
				<script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
				<script src="{{asset('assets/js/jquery.dropotron.min.js')}}" type="text/javascript"></script>
				<script src="{{asset('assets/js/jquery.dropotron.min.js')}}" type="text/javascript"></script>
				<script src="{{asset('assets/js/browser.min.js')}}" type="text/javascript"></script>
				<script src="{{asset('assets/js/breakpoints.min.js')}}" type="text/javascript"></script>
				<script src="{{asset('assets/js/util.js')}}" type="text/javascript"></script>
				<script src="{{asset('assets/js/main.js')}}" type="text/javascript"></script>
				<script src="/js/app.js"></script>
			</body>
			</html>
			