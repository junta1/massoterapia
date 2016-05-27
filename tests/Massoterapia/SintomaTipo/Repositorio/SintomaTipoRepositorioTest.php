<?php

namespace tests\Massoterapia\SintomaTipo\Repositorios;

use App\Massoterapia\SintomaTipo\Model\SintomaTipoModel;
use App\Massoterapia\SintomaTipo\Repositorio\SintomaTipoRepositorio;

class SintomaTipoRepositorioTest extends \TestCase
{

    protected $sintomaTipoModel;
    protected $sintomaTipoRepositorio;
    
    public function criarObjeto()
    {
        $this->sintomaTipoModel = new SintomaTipoModel();
        $this->sintomaTipoRepositorio = new SintomaTipoRepositorio($this->sintomaTipoModel);
    }
    
    /**
     * 
     * @group salvar repositorio
     */
    public function testSalvar()
    {
        $this->criarObjeto();
        
        $input = [
            'nomeSintomas' => 'Sintoma com categoria hábito',
            'categoria' => 2
        ];
        
        $this->sintomaTipoRepositorio->save($input);
        
//        $this->assertEquals($this->sintomaTipoModel, $esperado);
        
    }
}