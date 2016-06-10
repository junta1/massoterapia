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
                ->paginate(10);
        
        return $dados;
        /**
         * 
         * select 
        tb_cadastro_paciente.nome_pac,
        tb_cadastro_paciente.cpf_pac,
        tb_consulta.data_consulta,
        tb_profissional.nome_profissional,
        tb_cargo.nome_cargo

        from tb_consulta

        inner join tb_cadastro_paciente
        on tb_consulta.fk_cadastro_paciente_id = tb_cadastro_paciente.id

        inner join tb_profissional
        on tb_consulta.fk_profissional_id = tb_profissional.id

        inner join tb_cargo
        on tb_profissional.fk_cargo_id = tb_cargo.id
         */
    }
    
    public function save(array $input) 
    {
        $dados = [
            'data_consulta' => $input['dataConsulta'],
            'fk_cadastro_paciente_id' => $input['nomePaciente'],
            'fk_profissional_id' => $input['nomeProfissional']
        ];
        
        $this->consultaModel->create($dados);
    }
    
    public function find($id)
    {
         
    }
    
    public function update($id, array $input)
    {
       
    }
    
    public function delete($id)
    {
        
    }
}
