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

    <div class="boxCadastro">
        <div class="itemBoxCadastro">
            <button type="button" id="adicionar-mensagem" class="add-mensagem" style="float: left">Adicionar Nova Mensagem</button>
        </div>
    </div>
    <div id="mensagens">
        @foreach ($mensagems->all() as $mensagem)
        <hr class='solid'>
        <form name='form' class='formMensagem' action=\"{{route('mensagem.teste')}}\" method=\"post\" enctype=\"multipart/form-data\">
            @csrf
            <div class='boxCadastro'>
                @if($mensagem->inicial !=true)
                <div class="itemBoxCadastro">
                    <label for="dropdown">Selecione a opção que irá chamar está mensagem:</label>
                    <select name="opcao-id" id="dropdown" class="dropdown-select">

                    </select>
                </div>
                @endif
                                <div class='itemBoxCadastro'>
                                    <label style='float: left'>Descrição da mensagem*:</label>
                                    <textarea class='componenteInputCadastro' type='text' id='mensagem' name='mensagem'
                                              placeholder='Escreva aqui a mensagem..'
                                              style='width: 100%; float: left; resize: none'>{{$mensagem['mensagem']}}</textarea>
                                </div>
                                <div class='itemBoxCadastro'>
                                    <button type='button' class='add-opcao' style='float: left'>Adicionar Opção</button>
                                </div>
                            <row>
                                    <div class='opcao' style='display: inline'>
                                        @foreach ($opcoes->all() as $opcao)
                                            @if($opcao['mensagem_id_origem'] == $mensagem->id)
                                            <div class='opcao-div' style='float: left'>
                                                <input class='new-opcao' type='text' name='opcao[]' value="{{$opcao['descricao_opcao']}}" placeholder='Digite a opção'/>
                                                <button type='submit' class='remove-opcao' value="{{$opcao['id']}}" name='remove'>X</button>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                            </row>
                        </div>
                    <div><input type='submit' class='button' value='Atualizar'/></div>
            </form>
        @endforeach
    </div>

    <script>

        $('#adicionar-mensagem').click(function () {
            $("#mensagens").append(
                "<hr class='solid'>" +
                "<form name='form' class='formMensagem' action=\"{{route('mensagem.teste')}}\" method=\"post\" enctype=\"multipart/form-data\">" +
                "<div class='boxCadastro'>" +
                "            <div class='itemBoxCadastro'>"+
                "                <div class='itemBoxCadastro'>" +
                "                    <label for='dropdown'>Selecione a opção que irá chamar está mensagem:</label>" +
                "                    <select name='opcao-id' id='dropdown' class='dropdown-select'>" +
                "                    </select>" +
                "                </div>" +
                "                <label style='float: left'>Descrição da mensagem*:</label>" +
                "                <textarea class='componenteInputCadastro' type='text' id='mensagem' name='mensagem'" +
                "                          placeholder='Escreva aqui a mensagem..'" +
                "                          style='width: 100%; float: left; resize: none'></textarea>" +
                "            </div>" +
                "            <div class='itemBoxCadastro'>" +
                "                <button type='button' class='add-opcao' style='float: left'>Adicionar Opção</button>" +
                "            </div>" +
                "            <row>" +
                "                <div class='opcao' style='display: inline'>" +
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
            let idDropDown;
            $('.dropdown-select').attr('id', function(i) {
                idDropDown = i;
                return i;
            });
            $.ajax({
                type: "POST",
                url: "{{ route('mensagem.listarOpcoes') }}",
                beforeSend: function (request){
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(data)
                {
                    helpers.buildDropdown(
                        jQuery.parseJSON(data),
                        $('#'+idDropDown+'.dropdown-select'),
                        'Nenhuma Opção'
                    );
                }
            });
            let helpers = {
                buildDropdown: function(result, dropdown, emptyMessage)
                {
                    dropdown.html('');
                    dropdown.append('<option value="">'+emptyMessage+'</option>');
                    if(result != '')
                    {
                        $.each(result, function(k, v) {
                            dropdown.append('<option value="'+v.id+'">'+ v.descricao_opcao +'</option>');
                        });
                    }
                }
            }
        });

    </script>
    <script>

        $('body').delegate('.add-opcao', 'click', function() {
            let id = $(this).attr('id');
            $('div#'+id+'.opcao').append("<div class='opcao-div' style='float: left'> " +
                "<input class='new-opcao' type='text' name='opcoes[]' placeholder='Digite a opção'/>" +
                "<button type='submit' class='remove-opcao' name='remove'>X</button>" +
                "</div>");
            $('.remove-opcao').attr('id', function(i) {
                return i;
            });
            $('.new-opcao').attr('id', function(i) {
                return i;
            });
            $('.opcao-div').attr('id', function(i) {
                return i;
            });
        });
    </script>

    <script>
        let idRemovido
        $('body').delegate('.remove-opcao', 'click', function() {
            let id = $(this).attr('id');
            idRemovido = $(this).attr('value');
            console.log(idRemovido);
            $(this).closest('div#'+id+'.opcao-div').remove();
            let buttonClicked = $(this)
            if(buttonClicked.data('requestRunning')){
                return
            }

            $.ajax({
                url: "{{ route('mensagem.deletarOpcao') }}",
                type: "delete",
                data: {'idToRemove': idRemovido},
                beforeSend: function (request){
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function (response) {
                    console.log(response)
                },
                complete: function () {
                    buttonClicked.data('requestRunning', false);
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('mensagem.listarOpcoes') }}",
                beforeSend: function (request){
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(data)
                {
                    helpers.buildDropdown(
                        jQuery.parseJSON(data),
                        $('.dropdown-select'),
                        'Nenhuma Opção'
                    );
                }
            });
            let helpers = {
                buildDropdown: function(result, dropdown, emptyMessage)
                {
                    dropdown.html('');
                    dropdown.append('<option value="">'+emptyMessage+'</option>');
                    if(result != '')
                    {
                        $.each(result, function(k, v) {
                            dropdown.append('<option value="'+v.id+'">'+ v.descricao_opcao +'</option>');
                        });
                    }
                }
            }

        })
    </script>

    <script>
        $('body').on('click','.button', function () {
            $('form[class="formMensagem"]').submit(function (event) {
                event.preventDefault()
                let id= $(this).attr('id');
                let buttonClicked = $(this);
                let url = window.location.pathname;
                let formData = $(this).serialize();
                console.log(formData);

                if(buttonClicked.data('requestRunning')){
                    return
                }

                buttonClicked.data('requestRunning', true);

                $.ajax({
                    url: "{{ route('mensagem.teste') }}",
                    type: "post",
                    data: formData,
                    dataType : 'json',
                    beforeSend: function (request){
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function (response) {
                        console.log(response)
                    },
                    complete: function () {
                        console.log('complete')
                        buttonClicked.data('requestRunning', false);
                    }
                });
            })
        })
    </script>

    <script>
        window.onload = function () {
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
            $('.remove-opcao').attr('id', function(i) {
                return i;
            });
            $('.new-opcao').attr('id', function(i) {
                return i;
            });
            $('.opcao-div').attr('id', function(i) {
                return i;
            });
            $('.id-opcao-cadastrada').attr('id', function(i) {
                return i;
            });
            $('.dropdown-select').attr('id', function(i) {
                return i;
            });
        }
    </script>

    <script>
        $.ajax({
            type: "POST",
            url: "{{ route('mensagem.listarOpcoes') }}",
            beforeSend: function (request){
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function(data)
            {
                helpers.buildDropdown(
                    jQuery.parseJSON(data),
                    $('.dropdown-select'),
                    'Nenhuma Opção'
                );
            }
        });
        let helpers = {
            buildDropdown: function(result, dropdown, emptyMessage)
            {
                dropdown.html('');
                dropdown.append('<option value="">'+emptyMessage+'</option>');
                if(result != '')
                {
                    $.each(result, function(k, v) {
                        dropdown.append('<option value="'+v.id+'">'+ v.descricao_opcao +'</option>');
                    });
                }
            }
        }
    </script>

</div>


@endsection