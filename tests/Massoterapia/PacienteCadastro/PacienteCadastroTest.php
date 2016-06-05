<?php

namespace tests\Massoterapia\PacienteCadastro;

use App\Massoterapia\PacienteCadastro\Model\PacienteCadastroModel;
use App\Massoterapia\PacienteCadastro\Repositorio\PacienteCadastroRepositorio;
use App\Massoterapia\PacienteCadastro\PacienteCadastro;

class PacienteCadastroTest extends \TestCase
{
    protected $pacienteCadastroModel;
    protected $pacienteCadastroRepositorio;
    protected $pacienteCadastroNegocio;
    
    public function criarObjeto()
    {
        $this->pacienteCadastroModel = new PacienteCadastroModel();
        $this->pacienteCadastroRepositorio = new PacienteCadastroRepositorio($this->pacienteCadastroModel);
        $this->pacienteCadastroNegocio = new PacienteCadastro ($this->pacienteCadastroRepositorio);
    }
    
    /**
     * @group buscar paciente negocio
     */
    public function testBuscar()
    {
        $this->criarObjeto();
        
        $dados = $this->pacienteCadastroNegocio->all();
        $this->assertNotEmpty($dados);
    }
    
    /**
     * @group salvar paciente negocio 
     */
    public function testSalvar()
    {
        $this->criarObjeto();
        
        $input = [
            'nomePaciente' => 'Rafael negocio',
            'cpfPaciente' => '012345648',
            'emailPaciente' => 'rafa4@email.com',
            'dataNascimentoPaciente' => '1990/04/22',
            'sexoPaciente' =>'m'
        ];
        
        $this->pacienteCadastroNegocio->save($input);
    }
    
    /**
     * @group especifico paciente negocio
     */
    public function testEspecifico()
    {
        $this->criarObjeto();
        $id = 1;
        $especifico = $this->pacienteCadastroNegocio->find($id);
        $esperado = 'Rafael';
//        dd($especifico);
        $this->assertEquals($esperado, $especifico->nomePaciente);
    }
    
    /**
     * @group editar paciente negocio
     */
    public function testEditar()
    {
        $this->criarObjeto();
        $id = 1;
        $input = [
            'id' => $id,
            'nomePaciente' => 'Rafael att negocio',
            'cpfPaciente' => '01233',
            'emailPaciente' => 'rafa182@email.com',
            'dataNascimentoPaciente' => '1990/04/22',
            'sexoPaciente' =>'m'
        ];
        $editar = $this->pacienteCadastroNegocio->update($id, $input);
        $this->assertTrue($editar);
    }
    
    /**
     * @group apagar paciente negocio
     */
    public function testApagar()
    {
        $this->criarObjeto();
        $id = 9;
        $dados = [
            'id' => $id
        ];
        $apagar = $this->pacienteCadastroNegocio->delete($dados);
        $this->assertEmpty($apagar);
    }
}
