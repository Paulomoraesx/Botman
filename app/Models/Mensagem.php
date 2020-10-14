<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillable = ['mensagem','inicial','chatbot_id'];


    public function chatbot() {
        return $this->belongsTo('App\Models\Chatbot');
    }

}
