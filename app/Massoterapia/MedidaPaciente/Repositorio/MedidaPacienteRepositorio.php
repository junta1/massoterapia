<?php

namespace App\Massoterapia\MedidaPaciente\Repositorio;

use App\Massoterapia\MedidaPaciente\Model\MedidaPacienteModel;

class MedidaPacienteRepositorio
{
    protected $medidaModel;
    
    public function __construct(MedidaPacienteModel $medidaModel)
    {
        $this->medidaModel = $medidaModel;
    }
    
    public function all($input = null)
    {
        return $this->medidaModel
                ->select('id','nome_area_medida')
                ->paginate(10);
    }
    
    public function getWhere(array $input)
    {
        return $this->medidaModel
                ->select('id','nome_area_medida')
                ->where('nome_area_medida','LIKE','%' . $input['busca'] . '%')
                ->paginate(10);
    }


    public function save(array $input)
    {
        $dados = [
            'nome_area_medida' => $input['areaMedida']
        ];
        
        return $this->medidaModel->create($dados);
    }
    
    public function find($id)
    {
        return $this->medidaModel->find($id);
    }
    
    public function update($id, array $input)
    {
        $medida = $this->medidaModel->find($id);
        $medida->nome_area_medida = $input['areaMedida'];
        
        return $medida->save();
    }
    
    public function delete($id)
    {
        return $this->medidaModel->destroy($id);
    }
}
