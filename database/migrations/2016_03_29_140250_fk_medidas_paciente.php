<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkMedidasPaciente extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tb_medidas_paciente', function ($table) {

            $table->foreign('fk_medidas_id')->references('id')->on('tb_medidas');
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
