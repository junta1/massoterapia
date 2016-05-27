<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbSintomas extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     * unsigned: permite apenas número inteiros maior ou igual a 1.
     * unsignedInteger: além de permitir números inteiros maior ou igual a 1,
     * também define que serão do tipo integer.
     * 
     * O campo fk_categoria_id da tabela tb_sintomas é chave estrangeira do campo id
     * da tabela tb_categoria.
     * 
     */
    public function up() {
        Schema::create('tb_sintomas', function(Blueprint $table) {

            $table->increments('id');
            $table->string('nome_sintomas', 255);
            $table->rememberToken();
            $table->timestamps();
            
            $table->unsignedInteger('fk_categoria_id');
//            $table->foreign('fk_categoria_id')->references('id')->on('tb_categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tb_sintomas');
    }

}
