<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbConsulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_consulta', function(Blueprint $table){
            $table->increments('id');
            $table->date('data_consulta');
            $table->unsignedInteger('fk_cadastro_paciente_id');
            $table->unsignedInteger('fk_profissional_id');
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
