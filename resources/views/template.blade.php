<!DOCTYPE HTML>
<html>
<head>
    <title></title>
    <meta charset="utf-8"/>
    <!-- JQUERY -->
    <script src="{{asset('assets/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"/>
    <link href="{{asset('assets/css/default.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('assets/css/fonts.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('assets/css/estilo.css')}}" rel="stylesheet" type="text/css" media="all"/>

    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

<div id="wrapper">
    <div id="header" class="container">
        <div id="logo" class="cssLogo">
            <h1>Robo Monitor</h1>
        </div>
        <div id="menu">
            <div id="app"></div>
            <nav id="nav">
                <ul>
                    <li class="current"><a href="{{route('login')}}">Login</a></li>
                    <li class="current"><a href="{{route('inicio')}}">Inicio</a></li>
                    <li>
                        <a class="btns-nav">Cadastros</a>
                        <ul>
                            <div class="fundoEscolhasNav">
                                <li><a href="{{route('usuarios.cadastrar')}}">Usuario</a></li>
                                <li><a href="{{route('professors.cadastrar')}}">Professor</a></li>
                                <li><a href="{{route('alunos.cadastrar')}}">Aluno</a></li>
                                <li><a href="{{route('cursos.cadastrar')}}">Cursos</a></li>
                                <li><a href="{{route('materia.cadastrar')}}">Matéria</a></li>
                                <li><a href="{{route('pergunta.cadastrar')}}">Pergunta</a></li>
                                <li><a href="{{route('chatbot.cadastrar')}}">Chatbot</a></li>
                            </div>
                        </ul>
                    </li>
                    <li>
                        <a class="btns-nav">Listar</a>
                        <ul>
                            <div class="fundoEscolhasNav">
                                <li><a href="{{route('usuarios.listar')}}">Usuario</a></li>
                                <li><a href="{{route('professors.listar')}}">Professor</a></li>
                                <li><a href="{{route('alunos.listar')}}">Aluno</a></li>
                                <li><a href="{{route('cursos.listar')}}">Cursos</a></li>
                                <li><a href="{{route('materia.listar')}}">Matéria</a></li>
                                <li><a href="{{route('pergunta.listar')}}">Pergunta</a></li>
                                <li><a href="{{route('chatbot.listar')}}">Chatbot</a></li>
                            </div>
                        </ul>
                    </li>
                    <li>
                        <a class="btns-nav" href="/botman/tinker">BOTMAN</a>
                        <ul>
                            <div class="fundoEscolhasNav">
                                <li><a href="/botman/tinker">Iniciar</a></li>
                            </div>
                        </ul>
                    </li>
                    <li><a class="btns-nav" href="{{route('login')}}">Em Construção</a></li>
                    <li><a class="btns-nav" href="Contato.html">Em Construção</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div id="conteudo_principal">
        @yield('conteudo_principal')
    </div>
</div>
<div id="copyright" class="container">
    <p>Diretos reservados para Paulo e Joshua, com orientação do professor Carlos!</p>
</div>
<script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery.dropotron.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery.dropotron.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/browser.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/breakpoints.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/main.js')}}" type="text/javascript"></script>
<script src="/js/app.js"></script>
</body>

</html>
			