<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbSintomasRelatorios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sintomas_relatorios', function(Blueprint $table){
            $table->increments('id');
            $table->string('sintoma_resposta', 3);
            $table->unsignedInteger('fk_sintomas_id');
            $table->unsignedInteger('fk_consulta_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_sintomas_relatorios');
    }
}
