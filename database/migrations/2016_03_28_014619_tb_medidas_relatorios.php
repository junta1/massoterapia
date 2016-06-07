<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbMedidasRelatorios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_medidas_relatorios', function(Blueprint $table){
            $table->increments('id');
            $table->string('medida_resposta', 3);
            $table->unsignedInteger('fk_medidas_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_medidas_relatorios');
    }
}
