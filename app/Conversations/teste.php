<?php

namespace App\Conversations;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Models\Pergunta;

class teste extends Conversation
{

    protected $assunto;

    protected $stillNeedHelp;

    public function askForDatabase()
    {
        $question = Question::create('Você precisa de ajuda ?')
            ->fallback('Unable to create a new database')
            ->callbackId('create_database')
            ->addButtons([
                Button::create('Sim')->value('yes'),
                Button::create('Não')->value('no'),
            ]);
    
        $this->ask($question, function (Answer $answer) {
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                if($answer == 'yes'){
                    $this->askAssunto();
                }
                $selectedValue = $answer->getValue(); // will be either 'yes' or 'no'
                $selectedText = $answer->getText(); // will be either 'Of course' or 'Hell no!'
            }
        });
    }

    public function askAssunto(){
        $this->ask('Qual a sua duvida?', function(Answer $answer){
            $this->assunto = $answer->getText();
            
            if($answer->getText() == 'insert'){
                $this->answerInsert($this->assunto);
            }
            if($answer->getText() == 'o que compoe a mente'){
                $this->answerInsert($this->assunto);
            }
        });
    }

    public function answerInsert($parametro){
        $pergunta = Pergunta::where('descricao_pergunta', $parametro)->first();
        
        $this->say($pergunta->descricao_resposta);
        // 'Insert é uma função SQL para inserir dados numa determinada tabela de um banco de dados, 
        // a sintaxe para seu uso é INSERT INTO "nome_tabela (coluna, coluna) values (valor1, valor2)"
        $this->stillNeedHelp();
    }

    // public function retornarDoBanco(){
    //     $pergunta = new Pergunta();
    //     $pergunta = Pergunta::where('descricao_pergunta', $assunto)->first();
    //     dd($pergunta);
    //     return $pergunta->descricao_resposta;
    // }

    public function stillNeedHelp(){
        $this->ask('Precisa de mais alguma ajuda?', function(Answer $answer){
            $this->stillNeedHelp = $answer->getText();

            if($answer->getText() == 'sim'){
                $this->askAssunto();
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
        $this->askForDatabase();
    }
}
