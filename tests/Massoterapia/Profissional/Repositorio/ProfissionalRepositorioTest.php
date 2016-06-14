<?php

namespace tests\App\Massoterapia\Profissional\Repositorio;

use App\Massoterapia\Profissional\Model\ProfissionalModel;
use App\Massoterapia\Profissional\Repositorio\ProfissionalRepositorio;

class ProfissionalRepositorioTest extends \TestCase
{
    protected $model;
    protected $repositorio;
    
    public function criarObjeto()
    {
        $this->model = new ProfissionalModel();
        $this->repositorio = new ProfissionalRepositorio($this->model);
    }
    
    /**
     * @group busca profissional rep
     */
    public function testBuscaTodos()
    {
        $this->criarObjeto();
        
        $busca = $this->repositorio->all();
        dd($busca);
    }
    
    /**
     * @group salva profissional rep
     */
    public function testSalva()
    {
        $this->criarObjeto();
        $input= [
            'nomeProfissional' => 'Louco',
            'sexoProfissional' => 'm',
            'telefoneProfissional' =>1234657,
            'idCargo' => 7
        ];
        
        $dados = $this->repositorio->save($input);
        
        dd($dados);
    }
    
    /**
     * @group especifico profissional rep
     */
    public function testEspecifico()
    {
        $this->criarObjeto();
        $id = 2;
        
        $especifico = $this->repositorio->find($id);
        
        dd($especifico);
        
    }
   
    /**
     * @group filtro profissional rep
     */
    public function testFiltro()
    {
        $this->criarObjeto();
        
        $input = [
            'busca' => 'Ant'
        ];
        
        $busca = $this->repositorio->getWhere($input);
        
        dd($busca);
        
    }
    
    /**
     * @group edita profissional rep
     */
    public function testEdita()
    {
        $this->criarObjeto();
        $id = 2;
        
        $input= [
            'nomeProfissional' => 'Doido',
            'sexoProfissional' => 'f',
            'telefoneProfissional' =>23423,
            'idCargo' => 7
        ];
        
        $dados = $this->repositorio->update($id, $input);
        
        dd($dados);
    }
    
    /**
     * @group apaga profissional rep
     */
    public function testApaga()
    {
        $this->criarObjeto();
        
        $id = 2;
        
        $apagar = $this->repositorio->delete($id);
        
        dd($apagar);
        
    }
}
