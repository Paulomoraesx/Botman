<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = ['nome','matricula','curso_id'];

public function curso() {
        return $this->belongsTo('App\Models\Curso');
    }
}

