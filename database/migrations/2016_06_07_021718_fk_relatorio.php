<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkRelatorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_relatorio', function (Blueprint $table) {

            $table->foreign('fk_sintomas_id')->references('id')->on('tb_sintomas');
            $table->foreign('fk_medidas_id')->references('id')->on('tb_medidas');
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
        Schema::drop('tb_relatorio');
    }
}
