<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['matricula','nome','email','password','tipo_cadastro','curso_id', 'ativo'];

public function curso() {
        return $this->belongsTo('App\Models\Curso');
    }
}

