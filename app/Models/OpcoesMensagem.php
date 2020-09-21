<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpcoesMensagem extends Model
{
    protected $fillable = ['descricao_opcao','mensagem_id_destino','mensagem_id_origem'];


    public function mensagem() {
        return $this->belongsTo('App\Models\Mensagem');
    }
}
