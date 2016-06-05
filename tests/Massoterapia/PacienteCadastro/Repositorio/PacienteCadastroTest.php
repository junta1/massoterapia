<?php

namespace tests\Massoterapia\PacienteCadastro\Repositorios;

use App\Massoterapia\PacienteCadastro\Repositorio\PacienteCadastroRepositorio;
use App\Massoterapia\PacienteCadastro\Model\PacienteCadastroModel;

class PacienteCadastroTest extends \TestCase
{
    protected $pacienteCadastroModel;
    protected $pacienteCadastroRepositorio;
    
    public function criarObjeto()
    {
        $this->pacienteCadastroModel = new PacienteCadastroModel();;
        $this->pacienteCadastroRepositorio = new PacienteCadastroRepositorio($this->pacienteCadastroModel);
    }
    
    /**
     * @group salvar paciente repositorio
     */
    public function testSalvar()
    {
        $this->criarObjeto();
        
        $input = [
           'nomePaciente' => 'Rafael',
            'cpfPacinete' => '01234567',
            'emailPaciente' => 'rafa2@email.com',
            'dataNascimentoPaciente' => '1990/04/22',
            'sexoPaciente' =>'m'
        ];
//        dd($input);
        $this->pacienteCadastroRepositorio->save($input);
    }
}
