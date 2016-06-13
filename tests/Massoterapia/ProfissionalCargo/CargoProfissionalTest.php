<?php

namespace tests\Massoterapia\ProfissionalCargo;

use App\Massoterapia\ProfissionalCargo\Model\CargoProfissionalModel;
use App\Massoterapia\ProfissionalCargo\Repositorio\CargoProfissionalRepositorio;
use App\Massoterapia\ProfissionalCargo\CargoProfissional;

class CargoProfissionalTest extends \TestCase
{
    protected $cargoModel;
    protected $cargoRepositorio;
    protected $cargoNegocio;

    public function criarObjeto()
    {
        $this->cargoModel = new CargoProfissionalModel();
        $this->cargoRepositorio = new CargoProfissionalRepositorio($this->cargoModel);
        $this->cargoNegocio = new CargoProfissional($this->cargoRepositorio);
    }
    
    /**
     * @group busca cargo
     */
    public function testBuscaTodos()
    {
        $this->criarObjeto();
        $dados = $this->cargoNegocio->all();
        
        dd($dados);
    }
    
    /**
     * @group salva cargo
     */
    public function testSalva()
    {
        $this->criarObjeto();
        
        $input = [
            'nomeCargo' => 'Tupac da coab'
        ];
        
        $dados = $this->cargoNegocio->save($input);
        
        dd($dados);
    }
    
    /**
     * @group especifico cargo
     */
    public function testEspecifico()
    {
        $this->criarObjeto();
        
        $id = 8;
        
        $esperado = $this->cargoNegocio->find($id);
        
        dd($esperado);
    }
   
    /**
     * @group filtro
     */
    public function testFiltro()
    {
        $this->criarObjeto();
        
    }
    
    /**
     * @group edita cargo
     */
    public function testEdita()
    {
        $this->criarObjeto();
        
        $id = 8;
        
        $input = [
            'nomeCargo' => 'Tupac da coab2'
        ];
        
        $dados = $this->cargoNegocio->update($id, $input);
        
        dd($dados);
    }
    
    /**
     * @group apaga cargo
     */
    public function testApaga()
    {
        $this->criarObjeto();
        
        $id = 6;
        
        $apagar = $this->cargoNegocio->delete($id);
        
        dd($apagar);
    }
}
