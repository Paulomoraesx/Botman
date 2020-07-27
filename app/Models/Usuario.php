<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['matricula','nome','email','senha','tipo_cadastro','curso_id'];

public function curso() {
        return $this->belongsTo('App\Models\Curso');
    }
}

