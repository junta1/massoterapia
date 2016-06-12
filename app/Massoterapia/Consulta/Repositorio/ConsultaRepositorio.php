<?php

namespace App\Massoterapia\Consulta\Repositorio;

use App\Massoterapia\Consulta\Model\ConsultaModel;

class ConsultaRepositorio
{
    protected $consultaModel;
    
    public function __construct(ConsultaModel $consultaModel)
    {
        $this->consultaModel = $consultaModel;
    }
    
    public function all() 
    {
        $campos = [
        'tb_cadastro_paciente.nome_pac',
        'tb_cadastro_paciente.cpf_pac',
        'tb_consulta.data_consulta',
        'tb_profissional.nome_profissional',
        'tb_cargo.nome_cargo'
        ];
        
        $dados = $this->consultaModel
                ->select($campos)
                ->join('tb_cadastro_paciente','tb_consulta.fk_cadastro_paciente_id','=','tb_cadastro_paciente.id')
                ->join('tb_profissional','tb_consulta.fk_profissional_id','=','tb_profissional.id')
                ->join('tb_cargo','tb_profissional.fk_cargo_id','=','tb_cargo.id')
                ->orderBy('tb_cadastro_paciente.nome_pac', 'asc')
                ->paginate(2);
        
        return $dados;
    }
    
    public function getWhere(array $input)
    {
        $campos = [
        'tb_cadastro_paciente.nome_pac',
        'tb_cadastro_paciente.cpf_pac',
        'tb_consulta.data_consulta',
        'tb_profissional.nome_profissional',
        'tb_cargo.nome_cargo'
        ];
        
        $dados = $this->consultaModel
                ->select($campos)
                ->join('tb_cadastro_paciente','tb_consulta.fk_cadastro_paciente_id','=','tb_cadastro_paciente.id')
                ->join('tb_profissional','tb_consulta.fk_profissional_id','=','tb_profissional.id')
                ->join('tb_cargo','tb_profissional.fk_cargo_id','=','tb_cargo.id')
                ->where('tb_consulta.data_consulta', 'LIKE', '%' . $input['busca'] . '%')
                ->orderBy('tb_consulta.data_consulta', 'desc')
                ->paginate(10);
        
        return $dados;
    }
    
    public function save(array $input) 
    {
        $dados = [
            'data_consulta' => $input['dataConsulta'],
            'fk_cadastro_paciente_id' => $input['nomePaciente'],
            'fk_profissional_id' => $input['nomeProfissional']
        ];
        
        return $this->consultaModel->create($dados);
    }
    
    public function find($id)
    {
        $campos = [
        'tb_cadastro_paciente.nome_pac',
        'tb_cadastro_paciente.cpf_pac',
        'tb_consulta.data_consulta',
        'tb_profissional.nome_profissional',
        'tb_cargo.nome_cargo'
        ];
        
        $dados = $this->consultaModel
                ->select($campos)
                ->join('tb_cadastro_paciente','tb_consulta.fk_cadastro_paciente_id','=','tb_cadastro_paciente.id')
                ->join('tb_profissional','tb_consulta.fk_profissional_id','=','tb_profissional.id')
                ->join('tb_cargo','tb_profissional.fk_cargo_id','=','tb_cargo.id')
                ->where('tb_consulta.id','=',$id)
                ->first();
        
        return $dados;
    }
    
    public function update($id, array $input)
    {
        $consulta = $this->consultaModel->find($id);
        $consulta->data_consulta = $input['dataConsulta'];
        $consulta->fk_cadastro_paciente_id = $input['nomePaciente'];
        $consulta->fk_profissional_id = $input['nomeProfissional'];

        return $consulta->save();
    }
    
    public function delete($id)
    {
        return $this->consultaModel->destroy($id);
    }
}
