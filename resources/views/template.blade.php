<!DOCTYPE HTML>
<html>
<head>
    <title></title>
    <meta charset="utf-8"/>
    <!-- JQUERY -->
    <script src="{{asset('assets/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>

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
            <nav id="nav">
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                    </li>
                    @else
                    <li class="current"><a href="{{route('home')}}">Inicio</a></li>
                    @if(Auth::user()->tipo_cadastro == 'P')
                    <li>
                        <a class="btns-nav">Cadastros</a>
                        <ul>
                            <div class="fundoEscolhasNav">
                                <li><a href="{{route('usuarios.cadastrar')}}">Usuario</a></li>
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
                                <li><a href="{{route('cursos.listar')}}">Cursos</a></li>
                                <li><a href="{{route('materia.listar')}}">Matéria</a></li>
                                <li><a href="{{route('pergunta.listar')}}">Pergunta</a></li>
                                <li><a href="{{route('chatbot.listar')}}">Chatbot</a></li>
                            </div>
                        </ul>
                    </li>
                    @endif
                    <li>
                        <a class="btns-nav" href="/botman/tinker">BOTMAN</a>
                        <ul>
                            <div class="fundoEscolhasNav">
                                <li><a href="/botman/tinker">Iniciar</a></li>
                            </div>
                        </ul>
                    </li>
                    <li>
                        <a class="btns-nav">{{ Auth::user()->nome }}</a>
                        <ul>
                            <div class="fundoEscolhasNav">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li>
                            </div>
                        </ul>
                    </li>
                    @endguest
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
