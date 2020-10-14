<?php

namespace App\Conversations;
use App\Mensagem;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Models\Pergunta;

class teste extends Conversation
{

    protected $assunto;

    protected $stillNeedHelp;


    public function iniciarConversa()
    {
        //essa função deve recuperar o id do chatbot da sessão e chamar a função exibirMensagens();
        $dados = [
            Button::create('Sim')->value('yes'),
            Button::create('Não')->value('no'),
        ];
        // é possivel adicionar os botões num array antes de jogar no addButtons
        $question = Question::create('Você precisa de ajuda ?')
            ->fallback('Unable to create a new database')
            ->callbackId('create_database')
            ->addButtons(
                $dados);
    
        $this->ask($question, function (Answer $answer) {
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                if($answer == 'yes'){
                    $this->buscarMensagem(null, null);
                }
                $selectedValue = $answer->getValue(); // will be either 'yes' or 'no'
                $selectedText = $answer->getText(); // will be either 'Of course' or 'Hell no!'
            }
        });
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
        $this->iniciarConversa();
    }
}
