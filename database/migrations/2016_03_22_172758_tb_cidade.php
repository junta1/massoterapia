<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbCidade extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     * unsigned: permite apenas número inteiros maior ou igual a 1.
     * unsignedInteger: além de permitir números inteiros maior ou igual a 1,
     * também define que serão do tipo integer.
     * 
     * O campo fk_estado_id da tabela tb_cidade é chave estrangeira do campo id
     * da tabela tb_estado.
     */
    public function up() {
        Schema::create('tb_cidade', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 75);
            
            $table->unsignedInteger('fk_estado_id');

            //$table->foreign('fk_estado_id')->references('id')->on('tb_estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tb_cidade');
    }

}
