<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkCadastroPaciente extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tb_cadastro_paciente', function ($table) {

            $table->foreign('fk_endereco_id')->references('id')->on('tb_cadastro_endereco');
            $table->foreign('fk_plano_id')->references('id')->on('tb_cadastro_plano');
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
