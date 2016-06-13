<?php

namespace App\Massoterapia\ProfissionalCargo;

use App\Massoterapia\ProfissionalCargo\Repositorio\CargoProfissionalRepositorio;

class CargoProfissional
{
    
    protected $cargoRepositorio;
    
    public function __construct(CargoProfissionalRepositorio $cargoRepositorio)
    {
        $this->cargoRepositorio = $cargoRepositorio;
    }
    
    public function all($input = null)
    {
        if(!is_null($input)){
            return $this->cargoRepositorio->getWhere($input);
        }
        
        return $this->cargoRepositorio->all();
    }
    
    public function save(array $input)
    {
        return $this->cargoRepositorio->save($input);
    }
    
    public function find($id)
    {
        $dados = $this->cargoRepositorio->find($id);
        $cargo = new \stdClass();
        $cargo->id = $dados->id;
        $cargo->nomeCargo = $dados->nome_cargo;
        
        return $cargo;
    }
    
    public function update($id, array $input)
    {
        return $this->cargoRepositorio->update($id, $input);
    }
    
    public function delete($id)
    {
        return $this->cargoRepositorio->delete($id);
    }
    
}
