<?php

namespace App\Massoterapia\MedidaPaciente;

use App\Massoterapia\MedidaPaciente\Repositorio\MedidaPacienteRepositorio;

class MedidaPaciente
{
    protected $medidaRepositorio;
    
    public function __construct(MedidaPacienteRepositorio $medidaRepositorio)
    {
        $this->medidaRepositorio = $medidaRepositorio;
    }
    
    public function all($input = null)
    {
        if(!is_null($input)){
            return $this->medidaRepositorio->getWhere($input);
        }
        
        return $this->medidaRepositorio->all();
    }
    
    public function save($input)
    {
        return $this->medidaRepositorio->save($input);
    }
    
    public function find($id)
    {
        $input = $this->medidaRepositorio->find($id);
        $medida = new \stdClass();
        $medida->id = $input['id'];
        $medida->areaMedida = $input['nome_area_medida'];
        
        return $medida;
    }
    
    public function update($id, array $input)
    {
        return $this->medidaRepositorio->update($id, $input);
    }
    
    public function delete($id)
    {
        return $this->medidaRepositorio->delete($id);
    }
}
