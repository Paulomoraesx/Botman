<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoAlteracaoTabelaOpcoesMensagem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('opcoes_mensagems', function (Blueprint $table) {
            $table->integer("mensagem_id_destino")->unsigned()->nullable();
            $table->foreign('mensagem_id_destino')->references('id')->on('mensagems');
            $table->integer("mensagem_id_origem")->unsigned();
            $table->foreign('mensagem_id_origem')->references('id')->on('mensagems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
