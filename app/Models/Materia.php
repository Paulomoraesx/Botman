<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = ['descricao_materia','curso_id'];

public function curso() {
        return $this->belongsTo('App\Models\Curso');
    }
}

