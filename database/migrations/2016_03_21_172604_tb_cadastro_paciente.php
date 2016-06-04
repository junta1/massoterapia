<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbCadastroPaciente extends Migration {

    /**
     * Cadastro do paciente.
     *
     * @return void
     * 
     * unsigned: permite apenas número inteiros maior ou igual a 1.
     * unsignedInteger: além de permitir números inteiros maior ou igual a 1,
     * também define que serão do tipo integer.
     * 
     * O campo fk_endereco_id da tabela tb_cadastro_paciente é chave estrangeira do campo id
     * da tabela tb_cadastro_endereco.
     * 
     * O campo fk_plano_id da tabela tb_cadastro_paciente é chave estrangeira do campo id
     * da tabela tb_cadastro_plano.
     *  
     */
    public function up() {
        Schema::create('tb_cadastro_paciente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_pac', 80);
            $table->string('cpf_pac', 14)->unique();
            $table->integer('cod_plano');
            $table->string('email_pac', 60)->unique();
            $table->date('nascimento_pac');
            $table->string('sexo_pac', 1);
            $table->timestamps();

            $table->unsignedInteger('fk_endereco_id');
            
//            $table->foreign('fk_endereco_id')->references('id')->on('tb_cadastro_endereco');
//            $table->foreign('fk_plano_id')->references('id')->on('tb_cadastro_plano');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tb_cadastro_paciente');
    }

}
