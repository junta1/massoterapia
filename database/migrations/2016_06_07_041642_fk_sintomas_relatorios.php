<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkSintomasRelatorios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_sintomas_relatorios', function (Blueprint $table) {
            $table->foreign('fk_sintomas_id')->references('id')->on('tb_sintomas');
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
        
    }
}
