<?php

namespace tests\Massoterapia\SintomaTipo;

use App\Massoterapia\SintomaTipo\Model\SintomaTipoModel;
use App\Massoterapia\SintomaTipo\Repositorio\SintomaTipoRepositorio;
use App\Massoterapia\SintomaTipo\SintomaTipo;

class SintomaTipoTest extends \TestCase {
    
    protected $sintomaTipoModel;
    protected $sintomaTipoRepositorio;
    protected $sintomaTipoNegocio;
    
    public function criarObjeto()
    {
        $this->sintomaTipoModel = new SintomaTipoModel();
        $this->sintomaTipoRepositorio = new SintomaTipoRepositorio($this->sintomaTipoModel);
        $this->sintomaTipoNegocio = new SintomaTipo($this->sintomaTipoRepositorio);
    }
    
    /**
     * @group todos negocio
     */
    public function testTodos()
    {
        $this->criarObjeto();
        $todos = $this->sintomaTipoRepositorio->all();
        dd($todos);
//        $this->assertNotEmpty($todos);
    }
    
    /**
     * @group salvar negocio
     */
    public function testSalvar()
    {
        $this->criarObjeto();
        $valor = [
            'nomeSintomas' => 'Sente dor?',
            'categoria' => 1
        ];
        $this->sintomaTipoNegocio->save($valor);
        
//        $this->assertArraySubset($valor, $salvar);
    }
    
    /**
     * @group especifico negocio
     */
    public function testEspecifico()
    {
        $this->criarObjeto();
        $id = 1;
        $especifico = $this->sintomaTipoNegocio->find($id);
//        $esperado = 'pé Atualizado';
//        $this->assertEquals($esperado, $especifico->nomeSintomas);
    
        dd($especifico);
    }
    
    /**
     * @group editar negocio
     */
    public function testEditar()
    {
        $this->criarObjeto();
        $id = 1;
        $dados = [
            'id'=>$id,
            'nomeSintomas' => 'pé Atualizado',
            'categoria'=> 2
        ];
        $editar = $this->sintomaTipoNegocio->update($id, $dados);
        
        $this->assertTrue($editar);
    }
    
    /**
     * @group apagar negocio
     */
    public function testApagar()
    {
        $this->criarObjeto();
        $id = 8;
        $dados = [
            'id' => $id
        ];
        $apagar = $this->sintomaTipoNegocio->delete($dados);
        $this->assertEmpty($apagar);
    }
}
