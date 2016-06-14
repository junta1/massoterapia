<?php

namespace tests\Massoterapia\Profissional;

use App\Massoterapia\Profissional\Model\ProfissionalModel;
use App\Massoterapia\Profissional\Repositorio\ProfissionalRepositorio;
use App\Massoterapia\Profissional\Profissional;

class ProfissionalTest extends \TestCase
{
    protected $model;
    protected $repositorio;
    protected $negocio;
    
    public function criarObjeto()
    {
        $this->model = new ProfissionalModel();
        $this->repositorio = new ProfissionalRepositorio($this->model);
        $this->negocio = new Profissional($this->repositorio);
    }
    
    /**
     * @group busca profissional
     */
    public function testBuscaTodos()
    {
        $this->criarObjeto();
        
        $busca = $this->negocio->all();
        
        dd($busca);
    }
    
    /**
     * @group salva profissional
     */
    public function testSalva()
    {
        $this->criarObjeto();
        
        $input = [
            'nomeProfissional' => 'Zoera',
            'sexoProfissional' => 'm',
            'telefoneProfissional' => '56894',
            'idCargo' => 7
        ];
        
        $salva = $this->negocio->save($input);
        
        dd($salva);
    }
    
    /**
     * @group especifico profissional
     */
    public function testEspecifico()
    {
        $this->criarObjeto();
        
        $id = 3;
        
        $especifico = $this->negocio->find($id);
        
        dd($especifico);
    }
    
    /**
     * @group filtro profissional
     */
    public function testFiltro()
    {
        $this->criarObjeto();
        
        $input = [
            'busca' => 'bo'
        ];
        
        $busca = $this->negocio->all($input);
        
        dd($busca);
    }
    
    /**
     * @group edita profissional
     */
    public function testEdita()
    {
        $this->criarObjeto();
        
        $id = 3;
        
        $input = [
            'nomeProfissional' => 'Boneco Doido',
            'sexoProfissional' => 'f',
            'telefoneProfissional' => '54694',
            'idCargo' => 7
        ];
        
        $edita = $this->negocio->update($id, $input);
        
        dd($edita);
    }
    
    /**
     * @group apaga profissional
     */
    public function testApaga()
    {
        $this->criarObjeto();
        
        $id = 3;
        
        $apaga = $this->negocio->delete($id);
        
        dd($apaga);
    }
}
