<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Duvida extends Model
{
    protected $fillable = ['descricao_duvida','descricao_resposta','chatbot_id'];


    public function materia() {
        return $this->belongsTo('App\Models\Chatbot');
    }
    
}
