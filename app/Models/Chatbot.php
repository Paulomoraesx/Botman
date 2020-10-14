<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class   Chatbot extends Model
{
    protected $fillable = ['titulo','autor_id','chatbot_id', 'materia_id'];


    public function usuario() {
        return $this->belongsTo('App\Models\User');
    }

    public function materia(){
        return $this->belongsTo('App\Models\Materia');
    }
}
