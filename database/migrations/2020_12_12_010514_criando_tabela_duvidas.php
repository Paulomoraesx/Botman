<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaDuvidas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duvidas', function (Blueprint $table){
            $table->increments('id');
            $table->string('descricao_duvida');
            $table->integer('chatbot_id')->unsigned();
            $table->foreign('chatbot_id')->references('id')->on('chatbots');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->boolean('atendida')->default(false);
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
        Schema::dropIfExists('duvidas');
    }
}
