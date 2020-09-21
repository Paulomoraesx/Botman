<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nome','email','senha','tipo_cadastro','materia_id', 'ativo'];

public function materia() {
        return $this->belongsTo('App\Models\Materia');
    }
}

