<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbCadastroEndereco extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     * unsigned: permite apenas número inteiros maior ou igual a 1.
     * unsignedInteger: além de permitir números inteiros maior ou igual a 1,
     * também define que serão do tipo integer.
     * 
     * O campo fk_pais_id da tabela tb_endereco é chave estrangeira do campo id
     * da tabela tb_pais.
     */
    public function up() {
        Schema::create('tb_cadastro_endereco', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_endereco', 45);
            $table->string('endereco', 45);
            $table->string('complemento', 45);
            $table->string('cep', 14);
            $table->string('bairro', 45);
            $table->string('telefone', 10);
            $table->rememberToken();
            $table->timestamps();
            
            $table->unsignedInteger('fk_pais_id');
//            $table->foreign('fk_pais_id')->references('id')->on('tb_pais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('tb_cadastro_endereco');
    }

}
