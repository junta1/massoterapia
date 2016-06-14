<?php

namespace App\Massoterapia\Profissional;

use App\Massoterapia\Profissional\Repositorio\ProfissionalRepositorio;

class Profissional
{
    protected $profissionalRepositorio;
    
    public function __construct(ProfissionalRepositorio $profissionalRepositorio)
    {
        $this->profissionalRepositorio = $profissionalRepositorio;
    }
    
    public function all($input = null)
    {
        if(!is_null($input)){
            return $this->profissionalRepositorio->getWhere($input);
        }
        
        return $this->profissionalRepositorio->all();
    }
    
    public function save(array $input)
    {
        return $this->profissionalRepositorio->save($input);
    }
    
    public function find($id)
    {
        return $this->profissionalRepositorio->find($id);
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
