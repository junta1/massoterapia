<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkSintomasPacientes extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::table('tb_sintomas_pacientes', function (Blueprint $table) {

            $table->foreign('fk_sintomas_id')->references('id')->on('tb_sintomas');
            $table->foreign('fk_paciente_id')->references('id')->on('tb_cadastro_paciente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
