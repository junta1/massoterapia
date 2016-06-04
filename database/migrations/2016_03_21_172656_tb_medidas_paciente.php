<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbMedidasPaciente extends Migration {

    /**
     * @return void
     * 
     * unsigned: permite apenas número inteiros maior ou igual a 1.
     * unsignedInteger: além de permitir números inteiros maior ou igual a 1,
     * também define que serão do tipo integer.
     * 
     * O campo fk_medidas_id da tabela tb_medidas_paciente é chave estrangeira do campo id
     * da tabela tb_medidas.
     * 
     * O campo fk_paciente_id da tabela tb_medidas_paciente é chave estrangeira do campo id
     * da tabela tb_cadastro_paciente.
     *  
     */
    public function up() {
        Schema::create('tb_medidas_paciente', function (Blueprint $table) {
            $table->unsignedInteger('fk_medidas_id');
            $table->unsignedInteger('fk_paciente_id');
//            $table->foreign('fk_medidas_id')->references('id')->on('tb_medidas');
//            $table->foreign('fk_paciente_id')->references('id')->on('tb_cadastro_paciente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tb_medidas_paciente');
    }

}
