<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbEstado extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     * unsigned: permite apenas número inteiros maior ou igual a 1.
     * unsignedInteger: além de permitir números inteiros maior ou igual a 1,
     * também define que serão do tipo integer.
     * 
     * O campo fk_pais_id da tabela tb_estado é chave estrangeira do campo id
     * da tabela tb_pais.
     */
    public function up() {
        Schema::create('tb_estado', function(Blueprint $table) {

            $table->increments('id');
            $table->string('nome', 75);
            $table->string('uf', 5);
            $table->rememberToken();
            $table->timestamps();
            
            $table->unsignedInteger('fk_pais_id');
//            $table->foreign('fk_pais_id')->references('id')->on('tb_pais');
        });

        /**
         * Update: O campo fk_pais_id da tabela tb_estado é chave estrangeira do campo id
         * da tabela tb_pais.
         * @return void

          Schema::table('tb_estado', function ($table) {

          $table->foreign('id')
          ->references('id')->on('users')
          ->onUpdate('cascade');

          });
         * 
         */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tb_estado');
    }

}
