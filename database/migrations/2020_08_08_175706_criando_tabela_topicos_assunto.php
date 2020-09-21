<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaTopicosAssunto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topicos_assunto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao_topico');
            $table->string('resposta_topico');
            $table->integer('acessos');
            $table->integer('assunto_id')->unsigned();
            $table->foreign('assunto_id')->references('id')->on('assuntos');
            $table->timestamps();
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
