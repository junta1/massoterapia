<?php

namespace tests\Massoterapia\Consulta;

use App\Massoterapia\Consulta\Model\ConsultaModel;
use App\Massoterapia\Consulta\Repositorio\ConsultaRepositorio;
use App\Massoterapia\Consulta\Consulta;

class ConsultaTest extends \TestCase
{
    protected $consultaModel;
    protected $consultaRepositorio;
    protected $consultaNegocio;
    
    public function criarObjeto()
    {
        $this->consultaModel = new ConsultaModel();
        $this->consultaRepositorio = new ConsultaRepositorio($this->consultaModel);
        $this->consultaNegocio = new Consulta($this->consultaRepositorio);
    }
    
    /**
     * @group busca consulta
     */
    public function testBuscaTodos()
    {
        $this->criarObjeto();
        $dados = $this->consultaNegocio->all();
        
        dd($dados);
    }
    
    /**
     * @group salva consulta
     */
    public function testSalva()
    {
        $this->criarObjeto();
        $dados = [
            'dataConsulta' => '19900222',
            'nomePaciente' => 1,
            'nomeProfissional' => 1
        ];
        dd($dados);
        
        $this->consultaNegocio->save($dados);
    }
    
    /**
     * @group especifico consulta
     */
    public function testEspecifico()
    {
        $this->criarObjeto();
        $id = 1;
        
        $especifico = $this->consultaNegocio->find($id);
        
        dd($especifico);
    }
   
    /**
     * @group filtro consulta
     */
    public function testFiltro()
    {
        $this->criarObjeto();
        
        $input['busca'] = '199';
        $dados = $this->consultaNegocio->getWhere($input);
        
        dd($dados);
    }
    
    /**
     * @group edita consulta
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
        $dados = $this->consultaNegocio->update($id, $input);
        
        dd($dados);
    }
    
    /**
     * @group apaga consulta
     */
    public function testApaga()
    {
        $this->criarObjeto();
        $id = 1;
        
        $this->consultaNegocio->delete($id);
    }
}
