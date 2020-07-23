@extends('template')

@section('conteudo_principal')
<div id="featured">
		<div class="container">
			<div class="title">
				<h2>Robo Monitor</h2>
				<span class="byline">Tirando suas dúvidas em qualquer momento</span> </div>
			<p>Bem-vindo ao <strong>Robo Monitor </strong>, o chatbot especialista em tirar suas duvidas, 
				Tire suas dúvidas em nosso chatbot que utilizando tecnologias semelhantes a inteligencia artificial garante uma interação imersiva. <a href="{{route('alunos.cadastrar')}}">Cadastre-se</a> e comece a tirar suas duvidas. </p>
		</div>
	</div>
	<div id="extra" class="container">
		<div class="title">
			<h2>Ferramentas do professor</h2>
			<span class="byline">Nosso robo monitor está aqui para atender os professores que desejam melhorar a qualidade de atendimento aos alunos</span> </div>
		<div id="three-column">
			<div class="boxA">
				<div class="box"> <span class="fa fa-cloud-download"></span>
					<p>Cadastro de disciplinas</p>
				</div>
			</div>
			<div class="boxB">
				<div class="box"> <span class="fa fa-cogs"></span>
					<p>Cadastro de perguntas</p>
				</div>
			</div>
			<div class="boxC">
				<div class="box"> <span class="fa fa-user"></span>
					<p>Cadastro de respostas</p>
				</div>
			</div>
		</div>
		<ul class="actions">
			<li><a href="{{route('criandoChatBot')}}" class="button">Crie seu chatbot</a></li>
		</ul>
	</div>
	<div id="page" class="container">
		<div class="title">
			<h2>Ferramentas do aluno</h2>
			<span class="byline">Nosso robo monitor oferece ao aluno total suporte para que tire suas duvidas de forma exata</span> </div>
		<div class="gallery">
			<div class="boxA">Criação de contas e acesso a diversos chatbots</div>
			<div class="boxB">Seleção do chatbot a partir da disciplina ou curso</div>
			<div class="boxC">Interação dinâmica</div>
		</div>	
		<p>Utilizando nosso chatbot você aluno poderá tirar suas duvidas em qualquer momento do dia sem perder tempo, 
		e podendo realizar as suas atividades e trabalhos com mais agilidade</p>
		<ul class="actions">
			<li><a href="#" class="button">Crie sua conta</a></li>
		</ul>
	</div>
</div>
@endsection