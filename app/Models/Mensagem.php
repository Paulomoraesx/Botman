<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillable = ['texto','inicial','chatbot_id', 'opcao_mensagens_id'];


    public function chatbot() {
        return $this->belongsTo('App\Models\Chatbot');
    }

    public function opcoesMensagem(){
        return $this->belongsTo('App\Models\OpcoesMensagem');
    }
}
