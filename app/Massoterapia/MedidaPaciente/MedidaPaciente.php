<?php

namespace App\Massoterapia\MedidaPaciente;

use App\Massoterapia\MedidaPaciente\MedidaPaciente;

class MedidaPaciente
{
    protected $medidaRepositorio;
    
    public function __construct(MedidaPaciente $medidaRepositorio)
    {
        $this->medidaRepositorio = $medidaRepositorio;
    }
    
    public function all($input = null)
    {
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
