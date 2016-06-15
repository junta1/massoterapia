<?php

namespace tests\Massoterapia\SintomasRelatorios\Repositorio;

use App\Massoterapia\SintomasRelatorios\Model\SintomasRelatoriosModel;
use App\Massoterapia\SintomasRelatorios\Repositorio\SintomasRelatoriosRepositorio;

class SintomasRelatoriosRepositorioTest extends \TestCase
{

    protected $model;
    protected $repositorio;

    public function criarObjeto()
    {
        $this->model = new SintomasRelatoriosModel();
        $this->repositorio = new SintomasRelatoriosRepositorio($this->model);
    }

    /**
     * @group busca sintomarelatorio repo
     */
    public function testBuscaTodos()
    {
        $this->criarObjeto();

        $busca = $this->repositorio->all();

        dd($busca);
    }

    /**
     * @group salva sintomarelatorio repo
     */
    public function testSalva()
    {
        $this->criarObjeto();
        
        $dados = [
            'sintomaResposta' => 'sim',
            'codSintomas' => 1,
            'codConsulta' => 1
            ];
        
        $this->repositorio->save($dados);
        
    }

    /**
     * @group especifico sintomarelatorio repo
     */
    public function testEspecifico()
    {
        $this->criarObjeto();
        
        $id = 1;
        
        $dados = $this->repositorio->find($id);
        
        dd($dados);
    }

    /**
     * @group filtro sintomarelatorio repo
     */
    public function testFiltro()
    {
        $this->criarObjeto();
        
        $input = ['busca' => 'al'];
        
        $filtro = $this->repositorio->getWhere($input);
        
        dd($filtro);
    }
    
    /**
     * @group edita sintomarelatorio repo
     */
    public function testEdita()
    {
        $this->criarObjeto();
        
        $id = 1;
        
        $dados = [
            'sintomaResposta' => 'nao',
            'codSintomas' => 1,
            'codConsulta' => 1
            ];
        
        $edita = $this->repositorio->update($id, $dados);
        
        dd($edita);
    }
    
    /**
     * @group apaga sintomarelatorio repo
     */
    public function testApaga()
    {
        $this->criarObjeto();
        
        $id = 12;
        
        $apaga = $this->repositorio->delete($id);
        
        dd($apaga);
        
    }

}
