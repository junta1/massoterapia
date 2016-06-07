<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkRelatorioGeral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_relatorio_geral', function (Blueprint $table) {
            $table->foreign('fk_medidas_relatorios_id')->references('id')->on('tb_medidas_relatorios');
            $table->foreign('fk_sintomas_relatorios_id')->references('id')->on('tb_sintomas_relatorios');
            $table->foreign('fk_consulta_id')->references('id')->on('tb_consulta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_relatorio_geral');
    }
}
