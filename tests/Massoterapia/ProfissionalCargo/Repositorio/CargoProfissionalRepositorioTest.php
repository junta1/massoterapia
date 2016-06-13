<?php

namespace tests\Massoterapia\ProfissionalCargo\Repositorio;

use App\Massoterapia\ProfissionalCargo\Model\CargoProfissionalModel;
use App\Massoterapia\ProfissionalCargo\Repositorio\CargoProfissionalRepositorio;

class CargoProfissionalRepositorioTest extends \TestCase
{
    
    protected $cargoModel;
    protected $cargoRepositorio;
    
    
    public function criarObjeto()
    {
        $this->cargoModel = new CargoProfissionalModel();
        $this->cargoRepositorio = new CargoProfissionalRepositorio($this->cargoModel);
    }
    
    /**
     * @group busca cargo rep
     */
    public function testBuscaTodos()
    {
        $this->criarObjeto();
        
        $dados = $this->cargoRepositorio->all();
        
        dd($dados);
    }
    
    /**
     * @group salva cargo rep
     */
    public function testSalva()
    {
        $this->criarObjeto();
        
        $input = [
            'nomeCargo'=> 'Magary Lord'
        ];
        
        $dados = $this->cargoRepositorio->save($input);
        
        dd($dados);
    }
    
}
