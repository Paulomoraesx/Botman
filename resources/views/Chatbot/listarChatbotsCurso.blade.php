@extends('template')
@section('conteudo_principal')
<div id="page" class="container">
    <div class="title">
        <h2>Chatbots</h2>
    </div>    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleControls" data-slide-to="1"></li>
            <li data-target="#carouselExampleControls" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="testeCarossel">
                </div>
            </div>
            <div class="carousel-item">
                <div class="testeCarossel2"><a>teste</a></div>
            </div>
            <div class="carousel-item">
                <div class="testeCarossel3"><a>teste</a></div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Opções</th>
        </tr>
        </thead>
        <!-- DADOS -->
        <tbody>
        @foreach ($chatbots as $chatbot)
        <tr>
            <td>{{$chatbot['titulo']}}</td>
            <td>
                <a href="{{route('chatbot.acessarChatBot',['id' => $chatbot['id']])}}" style="text-decoration:none">Acessar
                    ChatBot</a>
            </td>
        </tr>
        @endforeach
        </tbody>
        <!-- DADOS [FIM] -->
    </table>
</div>

@endsection