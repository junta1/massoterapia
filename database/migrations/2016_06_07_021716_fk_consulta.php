<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkConsulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_consulta', function (Blueprint $table) {

            $table->foreign('fk_cadastro_paciente_id')->references('id')->on('tb_cadastro_paciente');
            $table->foreign('fk_profissional_id')->references('id')->on('tb_profissional');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_consulta');
    }
}
