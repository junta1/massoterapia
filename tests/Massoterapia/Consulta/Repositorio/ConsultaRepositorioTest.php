<?php

namespace tests\Massoterapia\Consulta\Repositorio;

use App\Massoterapia\Consulta\Model\ConsultaModel;
use App\Massoterapia\Consulta\Repositorio\ConsultaRepositorio;

class ConsultaRepositorioTest extends \TestCase
{
    protected $consultaModel;
    protected $consultaRepositorio;
    
    public function criarObjeto()
    {
        $this->consultaModel = new ConsultaModel();
        $this->consultaRepositorio = new ConsultaRepositorio($this->consultaModel);
    }
    
    /**
     * @group busca consulta repo
     */
    public function testBuscaTodos()
    {
        $this->criarObjeto();
        $dados = $this->consultaRepositorio->all();
        
        dd($dados);
    }
    
    /**
     * @group salva consulta repo
     */
    public function testSalva()
    {
        $this->criarObjeto();
        $dados = [
            'dataConsulta' => '19900222',
            'nomePaciente' => 1,
            'nomeProfissional' => 1
        ];
//        dd($dados);
        
        $this->consultaRepositorio->save($dados);
    }
    
    /**
     * @group especifico consulta repo
     */
    public function testEspecifico()
    {
        $this->criarObjeto();
        $id = 1;
        
        $especifico = $this->consultaRepositorio->find($id);
        
        dd($especifico);
    }
    
    /**
     * @group edita consulta repo
     */
    public function testEdita()
    {
        $this->criarObjeto();
        $id = 1;
        
        $input = [
            'id' => $id,
            'dataConsulta' => '1990/01/01',
            'nomePaciente' => 2,
            'nomeProfissional' => 1
            ];
        $dados = $this->consultaRepositorio->update($id, $input);
        
        dd($dados);
    }
    
    /**
     * @group apaga consulta repo
     */
    public function testApaga()
    {
        $this->criarObjeto();
        $id = 1;
        
        $this->consultaRepositorio->delete($id);
    }
}
