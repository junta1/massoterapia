<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkCadastroEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_cadastro_endereco', function (Blueprint $table) {
            
            $table->foreign('fk_cidade_id')->references('id')->on('tb_cidade');
            $table->foreign('fk_paciente_id')->references('id')->on('tb_cadastro_paciente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
