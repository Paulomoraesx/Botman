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
	
</head>

<body class="is-preload homepage">
	<div id="page-wrapper">
		
		<!-- Header -->
		<div id="header-wrapper">
			<header id="header" class="container">
				<!-- Logo -->
				<div id="logo">
					<h1><a href="{{route('inicio')}}">Robô Monitor Cesmac</a></h1>
				</div>
				
				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="current"><a href="{{route('inicio')}}">Bem Vindo!</a></li>
						<li>
							<a>Cadastros</a>
							<ul>
								<li><a href="{{route('professors.cadastrar')}}">Professor</a></li>
								<li><a href="{{route('alunos.cadastrar')}}">Aluno</a></li>
								<li><a href="{{route('cursos.cadastrar')}}">Cursos</a></li>
							</ul>
						</li>
						<li>
							<a href="{{route('professors.listar')}}">Listar</a>
							<ul>
								<li><a href="{{route('professors.listar')}}">Professor</a></li>
								<li><a href="{{route('alunos.listar')}}">Aluno</a></li>
								<li><a href="{{route('cursos.listar')}}">Cursos</a></li>
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
		</div>
				
				<!-- Main -->
				<div class="container">
					<!-- CONTEUDO PRINCIPAL [INICIO]-->
					@yield('conteudo_principal')
					<!-- CONTEUDO PRINCIPAL [FIM]-->
				</div>
				<!-- Sidebar -->
				<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
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
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
										<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
									</ul>
									<p>Centro Universitário Cesmac<br />
										Maceió,AL<br />
										(82)1111-1111</p>
									</section>
									
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div id="copyright">
										<ul class="menu">
											<li>Todos os direitos reservados por mim</li>
										</ul>
									</div>
								</div>
							</div>
						</footer>
					</div>
					
				</div>
				
				<!-- Scripts -->

			
				<script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
				<script src="{{asset('assets/js/jquery.dropotron.min.js')}}" type="text/javascript"></script>
				<script src="{{asset('assets/js/jquery.dropotron.min.js')}}" type="text/javascript"></script>
				<script src="{{asset('assets/js/browser.min.js')}}" type="text/javascript"></script>
				<script src="{{asset('assets/js/breakpoints.min.js')}}" type="text/javascript"></script>
				<script src="{{asset('assets/js/util.js')}}" type="text/javascript"></script>
				<script src="{{asset('assets/js/main.js')}}" type="text/javascript"></script>

			</body>
			</html>
			