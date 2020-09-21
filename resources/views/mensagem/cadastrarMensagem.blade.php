@extends('template')

@section('conteudo_principal')

<div id="page" class="container">
    <div class="title">
        <h2>Cadastro do fluxo de mensagens</h2>
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

    <form name="form" class='formMensagem' action="{{route('mensagem.teste')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="boxCadastro">
            <div class="itemBoxCadastro">
                <label style="float: left">Descrição da mensagem*:</label>
                <textarea class="componenteInputCadastro" type="text" id="mensagem" name="mensagem"
                          placeholder="Escreva aqui a mensagem.."
                          style="width: 100%; float: left; resize: none"></textarea>
            </div>

            <div class="itemBoxCadastro">
                <button type="button" class="add-opcao" style="float: left">Adicionar Opção</button>
            </div>
            <row>
                <div class="opcao">

                </div>
            </row>
        </div>
        <div><input type="submit" class="button" value="Cadastrar"/></div>
    </form>
    <div class="boxCadastro">
        <div class="itemBoxCadastro">
            <button type="button" id="adicionar-mensagem" class="add-mensagem" style="float: left">Adicionar Nova Mensagem</button>
        </div>
    </div>
    <div id="mensagens">

    </div>

    <script>
        var csrfVar = $('meta[name="csrf-token"]').attr('content');
        var opcao = 1;
        var addOpcao = 1;
        $('#adicionar-mensagem').click(function () {
            $("#mensagens").append(
                "<hr class='solid'>" +
                "<form name='form' class='formMensagem' action=\"{{route('mensagem.teste')}}\" method=\"post\" enctype=\"multipart/form-data\">" +
                "<input id='token' name='_token' value='"+csrfVar+"' type='hidden'/>" +
                "<div class='boxCadastro'>" +
                "            <div class='itemBoxCadastro'>" +
                "                <label style='float: left'>Descrição da mensagem*:</label>" +
                "                <textarea class='componenteInputCadastro' type='text' id='mensagem' name='mensagem'" +
                "                          placeholder='Escreva aqui a mensagem..'" +
                "                          style='width: 100%; float: left; resize: none'></textarea>" +
                "            </div>" +
                "            <div class='itemBoxCadastro'>" +
                "                <button type='button' class='add-opcao' style='float: left'>Adicionar Opção</button>" +
                "            </div>" +
                "            <row>" +
                "                <div class='opcao'>" +
                "                </div>" +
                "            </row>" +
                "        </div>" +
                "        <div><input type='submit' class='button' value='Cadastrar'/></div>" +
                "</form>"
            );
            $('.opcao').attr('id', function(i) {
                return i;
            });

            $('.add-opcao').attr('id', function(i) {
                return i;
            });
            $('.formMensagem').attr('id', function(i) {
                return i;
            });
            $('.button').attr('id', function(i) {
                return i;
            });
        });

    </script>
    <script>
        $('body').delegate('.add-opcao', 'click', function() {
            var id = $(this).attr('id');
            $('div#'+id+'.opcao').append("<input class='componenteInputCadastro' type='text' id='opcao' name='opcao[]' placeholder='Digite a opção'/>");
        });
        $('.opcao').attr('id', function(i) {
            return i;
        });

        $('.add-opcao').attr('id', function(i) {
            return i;
        });
        $('.formMensagem').attr('id', function(i) {
            return i;
        });
        $('.button').attr('id', function(i) {
            return i;
        });
    </script>

    <script>
        $('body').on('click','.button', function () {
            $('form[class="formMensagem"]').submit(function (event) {
                event.preventDefault()
                var id= $(this).attr('id');
                var buttonClicked = $(this);
                let formData = $('form#'+id).serialize();

                if(buttonClicked.data('requestRunning')){
                    return
                }

                buttonClicked.data('requestRunning', true);

                $.ajax({
                    url: "{{ route('mensagem.teste') }}",
                    type: "post",
                    data: formData,
                    dataType : 'json',
                    success: function (response) {
                        console.log(response)
                    },
                    complete: function () {
                        buttonClicked.data('requestRunning', false);
                    }
                });
            })
        })
    </script>

    <script>
        var csrfVar = $('meta[name="csrf-token"]').attr('content');
       $('body').on('click','.add-mensagem', function (event) {
                event.preventDefault()
                var buttonClicked = $(this);
                var url = window.location.pathname;
                var chatbotId = url.substring(url.lastIndexOf('/') + 1);

                console.log(chatbotId)

                if(buttonClicked.data('requestRunning')){
                    return
                }

                buttonClicked.data('requestRunning', true);

                $.ajax({
                    url: "{{ route('mensagem.listarOpcoes')}}",
                    type: "post",
                    data: {id: chatbotId, _token: csrfVar},
                    dataType: 'json',
                    success: function (response) {
                        console.log(response)
                    },
                    complete: function () {
                        buttonClicked.data('requestRunning', false);
                    }
                });
            })
    </script>



</div>


@endsection