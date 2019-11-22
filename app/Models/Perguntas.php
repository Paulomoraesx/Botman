<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perguntas extends Model
{
    protected $fillable = ['descricao_pergunta','materia_id'];


    public function materia() {
        return $this->belongsTo('App\Models\Materia');
    }
    
}
