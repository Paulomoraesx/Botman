<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = ['matricula','nome','cpf','curso_id','telefone'];

public function curso() {
        return $this->belongsTo('App\Models\Curso');
    }

}

