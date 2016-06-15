<?php

namespace App\Massoterapia\Profissional;

use App\Massoterapia\Profissional\Repositorio\ProfissionalRepositorio;
use App\Massoterapia\Profissional\Model\ProfissionalModel;

class Profissional
{
    protected $profissionalRepositorio;
    
    public function __construct()
    {
        $this->profissionalRepositorio = new ProfissionalRepositorio(new ProfissionalModel());
    }
    
    public function all($input = null)
    {
        if(!is_null($input)){
            return $this->profissionalRepositorio->getWhere($input);
        }
        
        return $this->profissionalRepositorio->all();
    }
    
    public function cargoAll()
    {
        $cargoModel = new \App\Massoterapia\ProfissionalCargo\Model\CargoProfissionalModel();
        $cargoRepositorio = new \App\Massoterapia\ProfissionalCargo\Repositorio\CargoProfissionalRepositorio($cargoModel);
        $cargoNegocio = new \App\Massoterapia\ProfissionalCargo\CargoProfissional($cargoRepositorio);
        
        return $cargoNegocio->all();
    }
    
    public function save(array $input)
    {
        return $this->profissionalRepositorio->save($input);
    }
    
    public function find($id)
    {
        $dados = $this->profissionalRepositorio->find($id);
        
        if (!$dados) {
            return new \stdClass();
        }
        
        $profissional = new \stdClass();
        $profissional->id = $dados->id;
        $profissional->nomeProfissional = $dados->nome_profissional;
        $profissional->sexoProfissional = $dados->sexo;
        $profissional->telefoneProfissional = $dados->telefone;
        $profissional->idCargo = $dados->fk_cargo_id;
        $profissional->nomeCargo = $dados->nome_cargo;
        
        return $profissional;
    }
    
    public function update($id, array $input)
    {
        return $this->profissionalRepositorio->update($id, $input);
    }
    
    public function delete($id)
    {
        return $this->profissionalRepositorio->delete($id);
    }
}
