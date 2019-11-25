<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    protected $fillable = ['descricao_pergunta','descricao_resposta','materia_id'];


    public function materia() {
        return $this->belongsTo('App\Models\Materia');
    }
    
}
