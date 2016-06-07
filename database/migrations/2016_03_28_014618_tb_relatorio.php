<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbRelatorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_relatorio', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('fk_sintomas_id');
            $table->string('sintoma_resposta', 3);
            $table->unsignedInteger('fk_medidas_id');
            $table->double('medida_resposta');
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
        Schema::drop('tb_relatorio');
    }
}
