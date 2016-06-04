<?php

namespace App\Massoterapia\PacienteEndereco\Repositorio;

use App\Massoterapia\PacienteEndereco\Model\PacienteEnderecoModel;

class PacienteEnderecoRepositorio 
{
    protected $pacienteEnderecoModel;
    
    public function __construct(PacienteEnderecoModel $pacienteEnderecoModel) 
    {
        $this->pacienteEnderecoModel = $pacienteEnderecoModel;
    }
    
    public function all()
    {
        return $this->pacienteEnderecoModel
                ->select('tb_cadastro_endereco.*','tb_pais.sigla')
                ->join('tb_pais','tb_pais.id','=','tb_cadastro_endereco.fk_pais_id')
                ->get();
    }
    
    public function save(array $input)
    {
        $dado = [
            'tipo_endereco' => $input['comercialOuResidencial'],
            'endereco' => $input['enderecoCompleto'],
            'complemento' => $input['enderecoComplemento'],
            'cep' => $input['endercoCep'],
            'bairro' => $input['enderecoBairro'],
            'telefone' => $input['telefoneComercialResidencial'],
            'fk_pais_id' => $input['codPais']
        ];
        
        return $this->pacienteEnderecoModel->create($dado);
    }
    
    public function find($id)
    {
        return $this->pacienteEnderecoModel
                ->select('tb_cadastro_endereco.*','tb_pais.sigla')
                ->join('tb_pais','tb_pais.id','=','tb_cadastro_endereco.fk_pais_id')
                ->where('tb_cadastro_endereco.id','=',$id)
                ->first();
    }
    
    public function update($id, array $input)
    {
        $dado = [
            'id' => $id,
            'tipo_endereco' => $input['comercialOuResidencial'],
            'endereco' => $input['enderecoCompleto'],
            'complemento' => $input['enderecoComplemento'],
            'cep' => $input['endercoCep'],
            'bairro' => $input['enderecoBairro'],
            'telefone' => $input['telefoneComercialResidencial'],
            'fk_pais_id' => $input['codPais']
        ];
        
        return $this->pacienteEnderecoModel->save($dado);
    }
    
    public function delete($id)
    {
        return $this->pacienteEnderecoModel->destroy($id);
    }
    
}