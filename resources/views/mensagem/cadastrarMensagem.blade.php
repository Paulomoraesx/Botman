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
        <form name='form' class='formMensagemAtualizar' action=\"{{route('mensagem.atualizarMensagem')}}\" method=\"put\" enctype=\"multipart/form-data\">
            @csrf
            <div class='boxCadastro'>
                <div class="idMensagem">
                    <input style="display: none" name="mensagemId" readonly="readonly" class="mensagemId" value="{{$mensagem->id}}"/>
                </div>

                @if($mensagem->inicial !=true)
                <div class="div-opcoes">
                    <label for="dropdown">Selecione a opção que irá chamar está mensagem:</label>
                    <select name="mensagem_id_destino" id="dropdown" class="dropdown-select">
                        <option value="">Nenhuma Opção</option>
                        @foreach($opcoes->all() as $opcao)
                            @if($opcao->mensagem_id_destino == $mensagem->id){
                                <option value="{{$opcao['id']}}" selected="selected">{{$opcao['descricao_opcao']}}</option>
                            }
                        @else{
                            <option value="{{$opcao['id']}}">{{$opcao['descricao_opcao']}}</option>
                            }
                        @endif
                        @endforeach
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
                                                <input class='new-opcao' multiple type='text' name='opcao[]' value="{{$opcao['descricao_opcao']}}" placeholder='Digite a opção'/>
                                                <input hidden name="opcaoId[]" value="{{$opcao['id']}}"/>
                                                <button type='submit' class='remove-opcao' value="{{$opcao['id']}}" name='remove'>X</button>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                            </row>
                        </div>
                    <div class="div-button">
                        <input type='submit' class='button atualizar' value='Atualizar'/>
                    </div>
            </form>
        @endforeach
    </div>

    <script>

        $('#adicionar-mensagem').click(function () {
            $("#mensagens").append(
                "<hr class='solid'>" +
                "<form name='form' class='formMensagem' action=\"{{route('mensagem.cadastrarMensagem')}}\" method=\"post\" enctype=\"multipart/form-data\">" +
                "<div class='boxCadastro'>" +
                "            <div class='itemBoxCadastro'>" +
                "              <div class='idMensagem'>" +
                "                </div>"+
                "                <div class='div-opcoes'>" +
                "                    <label for='dropdown'>Selecione a opção que irá chamar está mensagem:</label>" +
                "                    <select name='mensagem_id_destino' id='dropdown' class='dropdown-select'>" +
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
                "        <div class='div-button'>" +
                "           <input type='submit' class='button cadastrar' value='Cadastrar'/>" +
                "        </div>" +
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
            let idDropDown;
            $('.dropdown-select').attr('id', function(i) {
                idDropDown = i;
                return i;
            });
            $('.div-button').attr('id', function(i) {
                return i;
            });
            $('.div-opcoes').attr('id', function(i) {
                return i;
            });
            $('.idMensagem').attr('id', function(i) {
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
                "<input class='new-opcao' type='text' name='opcoesNovas[]' placeholder='Digite a opção'/>" +
                "<button type='submit' class='remove-opcao' name='remove'>X</button>" +
                "</div>");
            $('.remove-opcao').attr('id', function(i) {
                return i;
            });
            $('.opcao-div').attr('id', function(i) {
                return i;
            });
        });
    </script>

    <script>
        $('body').delegate('.remove-opcao', 'click', function() {
            $(this).closest('.opcao-div').remove();
            let idRemovido = $(this).attr('value');
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
                },
                complete: function () {
                    buttonClicked.data('requestRunning', false);
                }
            })
            listarOpcoes();
        })

    </script>

    <script>
        $(document).on('click','input.button.cadastrar', function () {
            $('form[class="formMensagem"]').submit(function (event) {
                event.preventDefault()
                let id= $(this).attr('id');
                let buttonClicked = $(this);
                let formData = $(this).serialize();
                if(buttonClicked.find('.mensagemId').val() !== undefined){
                    return
                }
                if(buttonClicked.data('cadastroRodando')){
                    return
                }

                buttonClicked.data('cadastroRodando', true);
                $.ajax({
                    url: "{{ route('mensagem.cadastrarMensagem') }}",
                    type: "post",
                    data: formData,
                    dataType : 'json',
                    beforeSend: function (request){
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function (response) {
                        $(buttonClicked.find('.idMensagem')).append("<input style='display: none' readonly='readonly' name='mensagemId' class='mensagemId' value="+ response['mensagemId'] +"  />")
                        if (response['inicial'] === true) {
                            $('div#' + id + '.div-opcoes').remove();
                        }
                        if (response['novaOpcao'] === true) {
                            listarOpcoes();
                            organizarOpcoes(response['mensagemId'])
                        }
                        $(buttonClicked.find('input.button.cadastrar')).remove();
                        $(buttonClicked.find('.div-button')).append('<input type="submit" class="atualizar button" value="Atualizar" />');
                        $(buttonClicked).attr({
                            "class": 'formMensagemAtualizar',
                            "method": 'put',
                            "action" : "{{route('mensagem.atualizarMensagem')}}"
                        })
                    },
                    complete: function () {
                        buttonClicked.data('cadastroRodando', false)
                    }
                });
            })
        })

        $(document).on('click', 'input.button.atualizar' ,function () {
            $('form[class="formMensagemAtualizar"]').submit(function (event) {
                event.preventDefault()
                let buttonClicked = $(this);
                let formData = $(this).serialize();

                if(buttonClicked.data('atualizacaoRodando')){
                    return
                }
                buttonClicked.data('atualizacaoRodando', true);
                $.ajax({
                    url: "{{ route('mensagem.atualizarMensagem') }}",
                    type: "put",
                    data: formData,
                    dataType : 'json',
                    beforeSend: function (request){
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function (response) {
                        if(response['novaOpcao']===true){
                            listarOpcoes()
                            organizarOpcoes(response['mensagemId'])
                        }
                    },
                    complete: function () {
                        buttonClicked.data('atualizacaoRodando', false);
                    }
                });
            })
        })

        function organizarOpcoes(id) {
            $.ajax({
                type: "POST",
                url: "{{ route('mensagem.listarOpcoesMensagem') }}",
                data: {'idMensagem':id},
                beforeSend: function (request){
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(data)
                {
                    listar.buildDiv(
                        jQuery.parseJSON(data),
                        $('.opcao')
                    );
                }
            });
            let listar = {
                buildDiv: function(opcoes, div)
                {
                    div.html('');
                    if(opcoes != '')
                    {
                        $.each(opcoes, function(k, v) {
                            div.append(
                                "<div class='opcao-div' style='float: left'>" +
                                "    <input class='new-opcao' type='text' name='opcao[]' value='"+v.descricao_opcao+"' placeholder='Digite a opção'/>" +
                                "    <input hidden name='opcaoId[]' value='"+v.id+"'/>" +
                                "    <button type='submit' class='remove-opcao' value='"+v.id+"' name='remove'>X</button>\n" +
                                "</div>")
                        });
                    }
                }
            }
        }

        function listarOpcoes(){
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
        }


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
            $('.opcao-div').attr('id', function(i) {
                return i;
            });
            $('.id-opcao-cadastrada').attr('id', function(i) {
                return i;
            });
            $('.dropdown-select').attr('id', function(i) {
                return i;
            });
            $('.div-button').attr('id', function(i) {
                return i;
            });
            $('.div-opcoes').attr('id', function(i) {
                return i;
            });
            $('.idMensagem').attr('id', function(i) {
                return i;
            });
            $('.formMensagemAtualizar').attr('id', function(i) {
                return i;
            });
        }
    </script>

</div>


@endsection