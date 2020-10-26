<?php

namespace App\Conversations;
use App\Mensagem;
use App\OpcoesMensagem;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Models\Pergunta;
use Illuminate\Support\Facades\Session;

class teste extends Conversation
{

    protected $assunto;

    protected $stillNeedHelp;


    public function responderUsuario($idMensagem)
    {
        //inicializando variaveis
        $opcoes = [];
        $mensagem = new Mensagem();
        //verificando se existe id como parametro para buscar am ensagem
        if($idMensagem == null){
            $mensagem = Mensagem::where('chatbot_id', Session::get('botUtilizado'))->where('inicial', true)->first();
            $opcaoMensagem = OpcoesMensagem::where('mensagem_id_origem', $mensagem->id)->get();
            foreach ($opcaoMensagem as $opcao){
                $add = Button::create($opcao->descricao_opcao)->value($opcao->mensagem_id_destino);
                $opcoes[] = $add;
            }
        }else{
            $mensagem = Mensagem::where('chatbot_id', Session::get('botUtilizado'))->where('id', $idMensagem)->first();
            $opcaoMensagem = OpcoesMensagem::where('mensagem_id_origem', $mensagem->id)->get();
            foreach ($opcaoMensagem as $opcao){
                $add = Button::create($opcao->descricao_opcao)->value($opcao->mensagem_id_destino);
                $opcoes[] = $add;
            }
        }
        //adicionando mensagem e opcoes
        $question = Question::create($mensagem->mensagem)
            ->addButtons(
                $opcoes);
        //função que envia mensagem e recebe a resposta do usuario
        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if($answer == null){
                    return;
                }else{
                    $this->responderUsuario($answer);
                }
            }
        });
        //verificando se existe opção na mensagem
        if($opcoes == null){
            $opcoes = [
                Button::create("Sim")->value("S"),
                Button::create("Não")->value("N")
            ];
            $question = Question::create("Precisa de ajuda em mais alguma coisa?")
                ->addButtons(
                    $opcoes);

            $this->ask($question, function (Answer $answer) {
                if ($answer->isInteractiveMessageReply()) {
                    if($answer == 'N'){
                        return;
                    }else{
                        $this->responderUsuario(null);
                    }
                }
            });
        }

    }

    public function buscarMensagem($chatbotID, $mensagemID){
        if($mensagemID == null){
            $mensagem = Mensagem::where('chatbot_id', $chatbotID)->where('inicial', true)->first();
        }else{
            $mensagem = Mensagem::where('chatbot_id', $chatbotID)->where('id', $mensagemID)->first();
        }

        $this->exibirMensagem($mensagem);

    }

    public function exibirMensagem($mensagem){
        $this->ask($mensagem, function(Answer $answer){
            $this->assunto = $answer->getText();
                $this->responderDuvida($this->assunto);
        });
    }

    public function responderDuvida($parametro){
        $pergunta = Pergunta::where('descricao_pergunta', $parametro)->first();
        
        if($pergunta == null){
            $this->say('Desculpe mas não tenho a resposta para sua dúvida');
        }else{
            $this->say($pergunta->descricao_resposta);
        }
        // 'Insert é uma função SQL para inserir dados numa determinada tabela de um banco de dados, 
        // a sintaxe para seu uso é INSERT INTO "nome_tabela (coluna, coluna) values (valor1, valor2)"
        $this->stillNeedHelp();
    }

    public function stillNeedHelp(){
        $this->ask('Precisa de mais alguma ajuda?', function(Answer $answer){
            $this->stillNeedHelp = $answer->getText();

            if($answer->getText() == 'sim'){
                $this->buscarMensagem(null, null);
            }
        });
    }
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->responderUsuario(null);
    }
}
