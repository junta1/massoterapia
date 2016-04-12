<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbSintomasPacientes extends Migration {

    /**
     * @return void
     * 
     * unsigned: permite apenas número inteiros maior ou igual a 1.
     * unsignedInteger: além de permitir números inteiros maior ou igual a 1,
     * também define que serão do tipo integer.
     * 
     * O campo fk_sintomas_id da tabela tb_sintomas_pacientes é chave estrangeira do campo id
     * da tabela tb_sintomas.
     * 
     * O campo fk_paciente_id da tabela tb_sintomas_pacientes é chave estrangeira do campo id
     * da tabela tb_cadastro_paciente.
     *  
     */
    public function up() {
        Schema::create('tb_sintomas_pacientes', function(Blueprint $table) {

            $table->rememberToken();
            $table->timestamps();
            
            $table->unsignedInteger('fk_sintomas_id');
            $table->unsignedInteger('fk_paciente_id');
//            $table->foreign('fk_sintomas_id')->references('id')->on('tb_sintomas');
//            $table->foreign('fk_paciente_id')->references('id')->on('tb_cadastro_paciente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tb_sintomas_pacientes');
    }

}
