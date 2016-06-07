<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbProfissional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_profissional', function(Blueprint $table){
            $table->increments('id');
            $table->string('nome_profissional',255);
            $table->string('cargo',255);
            $table->string('sexo',1);
            $table->string('telefone',45);
            $table->unsignedInteger('fk_cargo_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_profissional');
    }
}
