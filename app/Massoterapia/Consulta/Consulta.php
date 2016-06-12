<?php

namespace App\Massoterapia\Consulta;

use App\Massoterapia\Consulta\Repositorio\ConsultaRepositorio;

class Consulta
{
    protected $consultaRepositorio;
    
    public function __construct(ConsultaRepositorio $consultaRepositorio)
    {
        $this->consultaRepositorio = $consultaRepositorio;
    }
    
    public function all($input = null)
    {
        if (!is_null($input)) {
            return $this->consultaRepositorio->getWhere($input);
        }
        
        return $this->consultaRepositorio->all();
    }
    
    public function save($input)
    {
        return $this->consultaRepositorio->save($input);
    }
    
    public function find($id)
    {
        $consulta = $this->consultaRepositorio->find($id);
        $dados = new \stdClass();
        $dados->id = $consulta->id;
        $dados->dataConsulta = $consulta->data_consulta;
        $dados->nomePaciente = $consulta->nome_pac;
        $dados->nomeProfissional = $consulta->nome_profissional;
        
        return $dados;
        
//        return $this->consultaRepositorio->find($id);
    }
    
    public function update($id, $input)
    {
        return $this->consultaRepositorio->update($id, $input);
    }
    
    public function delete($i)
    {
        return $this->consultaRepositorio->delete($id);
    }
}
