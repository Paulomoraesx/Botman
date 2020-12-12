<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Duvida extends Model
{
    protected $fillable = ['descricao_duvida','chatbot_id', 'usuario_id', 'atendida'];


    public function chatbot() {
        return $this->belongsTo('App\Models\Chatbot');
    }

    public function usuario() {
        return $this->belongsTo('App\Models\User');
    }
    
}
